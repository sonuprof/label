<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use App\Models\Category;
use Illuminate\Support\Facades\DB as FacadesDB;

class ProductController extends Controller
{
    public function index()
    {
  
     $data['brand']=DB::table('brands')->select('brand')->distinct()->get();
     $data['category']=DB::table('categories')->select('parent')->distinct()->get();
     $data['ingredient']=DB::table('ingredients')->select('ingredient')->distinct()->get();
     $data['tittle']=DB::table('products')->select('title')->distinct()->get();

     $data['product']=DB::table('products')->get();



        return view('product.add-product',$data);
    }

    public function create(Request $request)
    {
       
        //  $created_by = $request->session()->get('login');
        $product = new product();
        $product->brand = $request->brand;
        $product->market_type = $request->market_type;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->parent_category = $request->parent_category;
        $product->title = $request->title;
        $product->sub_title = $request->sub_title;
        $product->product_size = $request->product_size;
        $product->ingredients = $request->ingredients;
        $product->mrp = $request->mrp;
        $product->created_by = "created_by";
        $product->save();
        return back()->with('status', 'product Added Successfully');
    }
   

    public function edit(Request $request, $id)
    {
        $data['product'] = Product::find($id);
    
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $id=$request->id;
        //  $created_by = $request->session()->get('login');
        $product = Product::find($id);
        $product->brand = $request->brand;
        $product->market_type = $request->market_type;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->parent_category = $request->parent_category;
        $product->category = $request->category;
        $product->title = $request->title;
        $product->sub_title = $request->sub_title;
        $product->product_size = $request->product_size;
        $product->ingredients = $request->ingredients;
        $product->mrp = $request->mrp;
        $product->save();
        return back()->with('status', 'Product Updated Successfully');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route("add-product"))->with('status', 'Product Data Deleted Successfully!!');
    }
 
   
    public function getCategories(Request $request)
    {
        $parentCategory = $request->input('parentCategory');
        $market = $request->input('market');
        $categories = Category::where('parent', $parentCategory)
        ->where('market_type', $market)
        ->get();
        return response()->json($categories);
    }
    
   
    
}
