<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models;
use Auth;

class TransferController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([

            'destination_account' => ['bail', 'required', 'numeric'],
            'funding_account' => ['bail', 'required', 'string'],
            'account_holder' => ['bail', 'required', 'string'],
            'description' => ['bail', 'required', 'string'],
            'amount' => ['bail', 'required', 'numeric'],
            'destination_bank' => ['bail', 'nullable', 'string'],
            'pin' => ['bail', 'nullable', 'numeric'],
            'security_token' => ['bail', 'nullable', 'string'],
            'swift_token' => ['bail', 'nullable', 'string'],
            'swift_code' => ['bail', 'nullable', 'string'],
           
        ]);

        $setMethod = Models\Admin::where('status', 'active')->first();
        $transactionMethod = $setMethod->link;
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;

        if($request->user()->pin != $request->pin){

            return back()->with('message', 'Incorrect pin, unauthorized transaction')->with('message-color', 'alert-danger');
        }elseif($request->amount > $balance){

            return back()->with('message', 'Insufficient Funds to complete your transaction')->with('message-color', 'alert-danger');
        }elseif($transactionMethod == 'otp_pass.php' && $request->security_token != '01hrps65rn739380wp48qj3dy7'){

            return back()->with('message', 'Invalid security token! Unauthorized transaction.')->with('message-color', 'alert-danger');
        }elseif($transactionMethod == 'otp_pass.php' && $request->swift_token != '01hryvfkaxhkfkwx2azp8mbt88'){

            return back()->with('message', 'Invalid swift token! Unauthorized transaction.')->with('message-color', 'alert-danger');
        }

        
        // debit account
        Models\UserPassbook::create([
            'user_id' => $request->user()->id,
            'trans_id' => bin2hex(random_bytes(10)),
            'trans_date' => Now(),
            'reference' => bin2hex(random_bytes(4)),
            'description' => $request->description,
            'trans_type' => 'debit',
            'amount' => $request->amount,
            'status' => 'completed',
        ]);

        $destination_account = $request->destination_account;
        $transferamount = $request->amount; 
        $destination_bank = $request->destination_bank;
        $account_holder = $request->account_holder;
        return view('dashboard.transferSuccessful', compact('destination_account', 'transferamount', 'destination_bank', 'account_holder'));
      
    }
}
