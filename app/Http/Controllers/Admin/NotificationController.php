<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    
    public function index(){
        $users=User::where('id','!=',auth()->id())->get();
        return view('admin.notification.index',compact('users'));
    }

    public function create_email(Request $request){
           
         if($request->input('id')){
           
            $users = User::whereIn('id',$request->input('id'))->get();
            return view('admin.notification.send_email',['users'=>$users,'ids'=>$request->input('id')]);
         }
         return back()->with('error','Please select One Email Must');
     
        
    }
    public function send_email(Request $request){
       
        $ids = explode(',', $request->input('ids'));
        $user = User::whereIn('id', $ids)->get();
        $data = [
            'subject' => $request->subject,
            'body' => $request->body,
        ];

        //  We can also pass  Parameter for Subject ANd Body
        foreach($user as $users){  
            dispatch(new SendMailJob($users)); 
        }
             dd('Done');            
        }
}
