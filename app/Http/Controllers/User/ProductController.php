<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\{Product,Category};
use App\Traits\FileUploadTrait;

class ProductController extends Controller
{
    use FileUploadTrait;
 public function index(){
    $products=Product::where('user_id','!=',auth()->id())->get();
    return view('user.product.index',['products'=>$products]);
   
 }
 public function add(){ 
    return view('user.product.add',['categoryies'=>Category::get()]);
 }
 public function view(){ 
   $products=Product::with('category')->where('user_id','=',auth()->id())->get();
   
   return view('user.product.view',['products'=>$products]);
 } 

 public function destory(Product $product)
      {
      
        $product->delete();
        return redirect()->back()->with('success', 'Product Delete Done.');
      }

 public function create(ProductRequest $request){

   $filePath=null;
   if($request->file('file')){
      $filePath = $this->uploadFileAndGetPath($request, 'product');
      if(!$filePath){
          return redirect()->back()->with('error', 'Sometime went wrong with file upload!');
      }
      }
      $products=$this->created_product($request,$filePath);
      if($products){
        return redirect()->back()->with('success', 'Product created successfully.');
       }
       return redirect()->back()->with('error', 'Somethings Went wrong.');
 }




   public function created_product($request,$filePath){
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
