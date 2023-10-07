<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KycDocument;
use App\Traits\FileUploadTrait;

class UserController extends Controller
{
    use FileUploadTrait;
    public function index(){
       return view('user.dashboard');
    }

  
    // public function createkyc(Request $request){
      
    //     $kycdocument=KycDocument::where('user_id',auth()->id())->first();
    //     if($kycdocument){
    //         return redirect()->back()->with('error', 'Already Apply For KYC');
    //     }
    //     $request->validate([
    //         'file' => 'required|max:2048',
    //     ]);
    //     if($request->file('file')){
    //         $filePath = $this->uploadFileAndGetPath($request, 'kyc');
    //         if(!$filePath){
    //             return redirect()->back()->with('error', 'Sometime went wrong with file upload!');
    //         }
    //         KycDocument::create(['user_id'=>auth()->id(),'file_path'=>$filePath,'status'=>'pending']);
    //          return redirect()->back()->with('success', 'Uploade Done! Wait For Approved');
        //  }
    // }
}
