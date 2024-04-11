<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['category'] = DB::table('categories')->get();
        $data['parent'] = DB::table('categories')->select('category')->get();
        return view('category.add-category',$data);
    }
   

    public function view_category(Request $request)
    {
         $data['category'] = DB::table('categories')->get();
        return view('category.view-category',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->parent = $request->parent;
        $category->created_by = $request->created_by;
        $category->save();
        return back()->with('status', 'Category Added Successfully');
    }

    public function edit(Request $request, $id)
    {
        $data['category'] = category::find($id);
    
        return response()->json($data);
    }


    public function update(Request $request)
    {
        $id=$request->id;
        $category = Category::find($id);
        $category->category = $request->category;
        $category->parent = $request->parent;
        $category->save();
        return redirect(route('add-category'))->with('status', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect(route("add-category"))->with('status', 'Category Data Deleted Successfully!!');
    }
}
