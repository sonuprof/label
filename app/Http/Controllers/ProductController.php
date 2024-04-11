<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {

        return view('product.add-product');
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
        $product->sub_category = $request->sub_category;
        $product->title = $request->title;
        $product->product_size = $request->product_size;
        $product->ingredients = $request->ingredients;
        $product->mrp = $request->mrp;
        $product->created_by = "created_by";
        $product->save();
        return back()->with('status', 'product Added Successfully');
    }
    public function view_product(Request $request)
    {
        $data['data'] = DB::table('products')->paginate(50);
        return view('product.view-product' ,$data);
    }
    

     public function edit($id)
    {
        $data['product'] = Product::find($id);
        return view('product.update-product', $data);
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route("view-brand"))->with('status', 'brand Data Deleted Successfully!!');
    }
 
   

   
}
