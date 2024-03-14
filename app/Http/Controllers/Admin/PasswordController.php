<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class PasswordController extends Controller
{
    //
    public function create(){
        return view('admin.password');
    }

    public function store(Request $request){
    
        $request->validate([
            'oldpassword' => ['bail', 'required', 'current_password:admin'],
            'password' => ['bail', 'required', 'confirmed', Password::min(8)->mixedCase()->numbers()->symbols()],
        ]);


        Auth::guard('admin')->user()->password = Hash::make($request->password);
        Auth::guard('admin')->user()->save();
        return redirect()->route('admin.password.create')->with('message', 'You updated your password')->with('message-color', 'alert-success');
    
   }
}
