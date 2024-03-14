<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function create(){
        return view('site.adminregister');
    }

    public function store(Request $request){
        $request->validate([

            
            'username' => ['bail', 'required', 'string'],
            'email' => ['bail', 'required', 'string', 'email', 'unique:'.Admin::class],
            'password' => ['bail', 'required', 'string', 'confirmed', Password::min(8)->symbols()->numbers()->mixedCase()],
            
        ]);

        $firstAdmin = Admin::all();
        if($firstAdmin->count() > 1){
            $status = 'inactive';
            $message = 'Admin Account Created, You might need a verified admin to activate your account';
            $route = 'admin.register.create';
        }else{
            $status = 'active';
            $message = 'Admin Account Created';
            $route = 'admin.login.create';
        }

        $admin = Admin::create([
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'status' => $status,
        ]);

        return redirect()->route($route)->with('message', $message)->with('message-color', 'alert-primary');
    }
}
