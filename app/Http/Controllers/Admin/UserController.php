<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //

    public function index(){
        $users = User::with('passbooks')->paginate(20);
        $debit = [];
        $credits = [];
        $totalCredit = 0;
        $totalDedit = 0;
        foreach($users as $user ){
            foreach($user->passbooks as $passbook){
                if($passbook->trans_type == 'credit'){
                    $totalCredit+= $passbook->amount;
                }elseif($passbook->trans_type == 'dedit'){
                    $totalCredit+= $passbook->amount;
                }
            }
            
            $credits[$user->id] = $totalCredit ;
            $debit[$user->id] = $totalDedit;
        }
        return view('admin.all')->with('users', $users)
                                ->with('credits', $credits)
                                ->with('debits', $debit);
    }

    public function create(){
        return view('admin.register');
    }

    public function store(Request $request){
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
            'question' => ['bail', 'required', 'string'],
            'answer' => ['bail', 'required', 'string'],
        ]);



        $user = User::create([
            'firstname' => strtolower($request->firstname),
            'lastname' => strtolower($request->lastname),
            'gender' => strtolower($request->gender),
            'dob' => strtolower($request->dob),
            'email' => strtolower($request->email),
            'phone' => strtolower($request->phone),
            'country' => strtolower($request->country),
            'state' => strtolower($request->state),
            'address' => strtolower($request->address),
            'accountnumber' => $request->accountnumber,
            'pin' => $request->pin,
            'password' => Hash::make($request->password),
            'status' => strtolower($request->status),
            'question' => strtolower($request->question),
            'answer' => $request->answer,
        ]);

        return back()->with('message', 'User account created, add transactions to the created account')->with('message-color', 'alert-success');
    }
}
