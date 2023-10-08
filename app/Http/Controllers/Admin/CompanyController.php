<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateCompanyRequest;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{

    public function index()
    {
       $users=User::where('role_id',3)->get();
        return view('admin.company.index',compact('users'));
    }

    public function store(CreateCompanyRequest $request)
    {
        // CreateCompanyRequest  (Validation)
        if(Gate::allows('store')){     // Policy 
            return response()->json(['message' => 'Your are not  authorize','error'=>'danger'], 200);
        }
        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=>3
        ]);
        if($user){
            return response()->json(['message' => 'Data saved successfully','error'=>'success'], 200);
        }
    }

    public function create()
    {
        return view('admin.company.add');
    }

    public function destroy($id)
    {
       
    User::findOrFail($id)->delete();
    return back()->with('success', 'Company deleted successfully');

    }
        //    This is Route Model Binding
    // public function edit(User $user)
    // {
    //    
    // }


}
