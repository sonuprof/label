<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\PrintProduct;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class PrintController extends Controller
{
    

    public function index()
    {
     $data['parent']=DB::table('products')->select('parent_category')->distinct()->get();
     $data['product']=DB::table('products')->select('product_name')->distinct()->get();
     $data['ingredient']=DB::table('ingredients')->select('ingredient')->distinct()->get();
      return view('product.add-print',$data);
    }
    public function getCategories(Request $request)
    {
        $parentCategory = $request->input('parentCategory');
        $market = $request->input('market');
        $categories = Product::where('parent_category', $parentCategory)
        ->where('market_type', $market)
        ->select('category')
        ->distinct()
        ->get();
        return response()->json($categories);
    }
    public function getProduct(Request $request)
    {
        $parentCategory = $request->input('parentCategory');
        $market = $request->input('market');
        $product_name = Product::where('parent_category', $parentCategory)
        ->where('market_type', $market)
        ->select('product_name')
        ->distinct()
        ->get();
        return response()->json($product_name);
    }

    public function create(Request $request)
    {
       
        //  $created_by = $request->session()->get('login');
        $PrintProduct = new PrintProduct();
        $PrintProduct->market_type = $request->market_type;
        $PrintProduct->category = $request->category;
        $PrintProduct->parent_category = $request->parent_category;
        $PrintProduct->quantity = $request->quantity;
        $PrintProduct->fmd_date = $request->fmd_date;
        $PrintProduct->expiry_date = $request->expiry_date;
        $PrintProduct->product_name = $request->product_name;
        $PrintProduct->dimension = $request->dimension;
        $PrintProduct->created_by = $request->created_by;
        $PrintProduct->save();
        return back()->with('status', 'PrintProduct Added Successfully');
    }
   

    public function edit(Request $request, $id)
    {
        $data['product'] = PrintProduct::find($id);
    
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $id=$request->id;
        //  $created_by = $request->session()->get('login');
        $PrintProduct = PrintProduct::find($id);
        $PrintProduct->brand = $request->brand;
        $PrintProduct->market_type = $request->market_type;
        $PrintProduct->product_code = $request->product_code;
        $PrintProduct->product_name = $request->product_name;
        $PrintProduct->parent_category = $request->parent_category;
        $PrintProduct->category = $request->category;
        $PrintProduct->title = $request->title;
        $PrintProduct->sub_title = $request->sub_title;
        $PrintProduct->product_size = $request->product_size;
        $PrintProduct->ingredients = $request->ingredients;
        $PrintProduct->mrp = $request->mrp;
        $PrintProduct->save();
        return back()->with('status', 'Print Updated Successfully');
    }
    public function destroy($id)
    {
        $PrintProduct = PrintProduct::find($id);
        $PrintProduct->delete();
        return redirect(route("add-print"))->with('status', 'PrintProduct Data Deleted Successfully!!');
    }
 
   
    // public function getCategories(Request $request)
    // {
    //     $parentCategory = $request->input('parentCategory');
    //     $market = $request->input('market');
    //     $categories = Category::where('parent', $parentCategory)
    //     ->where('market_type', $market)
    //     ->get();
    //     return response()->json($categories);
    // }
   
 
    public function generatePdf()
    {
        // Define the data for the PDF
        $data = [
            'title' => 'Sample PDF',
            'content' => 'This is a sample PDF generated using Laravel and Dompdf.'
        ];
    
        // Define the number of copies you want to generate
        $numCopies = 5;
    
        // Initialize an empty PDF content string
        $pdfContent = '';
    
        // Array to store custom paper sizes
        $customPaperSizes = [
            ['width' => 190  , 'height' => 97], // A4 size in millimeters
          
            // Add more custom sizes as needed
        ];
    
        // Loop to generate multiple copies of contsent
        for ($i = 0; $i < $numCopies; $i++) {
            // Define paper size style for current copy
            $paperStyle = 'style="width: ' . $customPaperSizes[$i % count($customPaperSizes)]['width'] . 'mm; height: ' . $customPaperSizes[$i % count($customPaperSizes)]['height'] . 'mm;"';
    
            // Add a page break before each copy except for the first one
            if ($i > 0) {
                $pdfContent .= '<div style="page-break-before:always;"></div>';
            }
    
            // Load the view and append its content to the PDF content string with custom paper size
            $pdfContent .= '<div ' . $paperStyle . '>' . view('index', $data)->render() . '</div>';
        }
    
        // Load the concatenated content into Dompdf
        $pdf = PDF::loadHtml($pdfContent);
    
        // (Optional) Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');
    
        // Return the PDF for download
        return $pdf->download('sample.pdf');
    }
    

}

