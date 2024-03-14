<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname' => ['bail', 'required', 'string'],
            'lastname' => ['bail', 'required', 'string'],
            'gender' => ['bail', 'required', 'string'],
            'dob' => ['bail', 'required', 'date'],
            'email' => ['bail', 'required', 'string', 'email', 'unique:'.User::class],
            'phone' => ['bail', 'required', 'string'],
            'country' => ['bail', 'required', 'string'],
            'state' => ['bail', 'required', 'string'],
            'address' => ['bail', 'required', 'string'],
            'accountnumber' => ['bail', 'required', 'numeric'],
            'pin' => ['bail', 'required', 'numeric'],
            'password' => ['bail', 'required', 'string', 'confirmed', Password::min(8)->symbols()->numbers()->mixedCase()],
            'status' => ['bail', 'required', 'string'],
            'passport' => ['bail', 'required', 'image', 'file'],
            'question' => ['bail', 'required', 'string'],
            'answer' => ['bail', 'required', 'string'],
        ]);



        $user = User::create([

        ]);

        return back()->with()->with();
    }
}
