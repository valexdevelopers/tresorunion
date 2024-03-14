<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    //
    public function create(){
        return view('site.adminlogin');
    }

    public function store(Request $request){
        $request->validate([
            'email' => ['bail', 'required', 'string', 'email'],
            'password' => ['bail', 'required', 'string'],
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.dashboard.home');
        }else{
            
            return back()->with('message', 'Account not found! Email or password Incorrect')
                         ->with('message-color', 'alert-danger');
        } 
    }
}
