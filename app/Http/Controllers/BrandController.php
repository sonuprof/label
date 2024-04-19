<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        return view('pages.dashboard');
    }
   
    public function index()
    {
        $data['brand'] = DB::table('brands')->get();

        return view('brands.add-brand',$data);
    }
   
    public function create(Request $request)
    {
        $brand = new brand();
        $brand->brand = $request->brand;
        $brand->created_by = $request->created_by;
        $brand->save();
        return back()->with('status', 'brand Added Successfully');
    }

    public function edit(Request $request, $id)
    {
        $data['brand'] = Brand::find($id);
    
        return response()->json($data);
    }


    public function update(Request $request)
    {
        $id=$request->id;
        $brand = brand::find($id);
        $brand->brand = $request->brand;
        $brand->save();
        return redirect(route('add-brand'))->with('status', 'brand Updated Successfully');
    }

    public function destroy($id)
    {
        $brand = brand::find($id);
        $brand->delete();
        return redirect(route("add-brand"))->with('status', 'brand Data Deleted Successfully!!');
    }
}