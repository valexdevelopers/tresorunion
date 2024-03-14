<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Auth;

class DashboardController extends Controller
{
    //

    public function index(){
        $users = User::paginate(20);
        return view('admin.index')->with('users', $users);
    }

    public function create(){
        return view('admin.method');
    }

    public function store(Request $request){
        $request->validate([
            'transfer_method' => ['bail', 'required', 'string'],
        ]);

        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->link =  $request->transfer_method;
            $admin->save();
        }
        return back()->with('message', 'You changed the transfer method')->with('message-color', 'alert-success');

    }

    public function logout(Request $request){
        
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login.create');
    }
}
