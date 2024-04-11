<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['ingredient'] = DB::table('ingredients')->get();

        return view('ingredients.add-ingredient',$data);
    }
   

    public function view_ingredient(Request $request)
    {
         $data['ingredient'] = DB::table('ingredients')->get();
        return view('ingredient.view-ingredient',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $ingredient = new Ingredient();
        $ingredient->ingredient = $request->ingredient;
        $ingredient->created_by = $request->created_by;
        $ingredient->save();
        return back()->with('status', 'Ingredient Added Successfully');
    }

    public function edit(Request $request, $id)
    {
        $data['ingredient'] = Ingredient::find($id);
    
        return response()->json($data);
    }


    public function update(Request $request)
    {
        $id=$request->id;
        $ingredient = Ingredient::find($id);
        $ingredient->ingredient = $request->ingredient;
        $ingredient->save();
        return redirect(route('add-ingredient'))->with('status', 'Ingredient Updated Successfully');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->delete();
        return redirect(route("add-ingredient"))->with('status', 'Ingredient Data Deleted Successfully!!');
    }
}
