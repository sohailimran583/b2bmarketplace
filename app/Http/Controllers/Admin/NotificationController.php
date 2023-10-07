<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    public function index(){
        $users=User::where('id','!=',auth()->id())->get();
        return view('admin.notification.index',compact('users'));
    }

    public function create_email(Request $request){
    
        $users = User::whereIn('id',$request->input('id'))->get();
    return view('admin.notification.send_email',['users'=>$users]);
        
    }
    public function send_email(Request $request){
        // return view('admin.notification.send_email',['id'=>$request->id]);
            
        }
}
