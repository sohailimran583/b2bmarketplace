<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ProductRequest;
use App\Models\{Product,Category};
use App\Traits\FileUploadTrait;

class ProductController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {
        $products=Product::where('user_id','=',auth()->id())->get();
        return view('company.product.index',['products'=>$products]);
    }
    public function create()
    {
        return view('company.product.create',['categoryies'=>Category::get()]);

    }
    public function store(Request $request)
    {
    $filePath=null;
   if($request->file('file')){
 //  also we can use Storage::disk('public')->putFile('folder name',$request->file('file'))
      $filePath = $this->uploadFileAndGetPath($request, 'product');
      if(!$filePath){
          return redirect()->back()->with('error', 'Sometime went wrong with file upload!');
      }
      }
      $products=$this->save_product($request,$filePath);
      if($products){
        return redirect()->back()->with('success', 'Product created successfully.');
       }
       return redirect()->back()->with('error', 'Somethings Went wrong.');
    }

    public function save_product($request,$filePath){
        $products =Product::create([
           'name'=> $request->name,
           'user_id' => auth()->id(), 
           'description' =>$request->description,
           'category_id' => $request->category,
           'price'=>$request->price,
           'image'=>isset($filePath) && $filePath?$filePath:null,
          ]);
          return $products;
     }

   
}
