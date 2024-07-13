<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendUserMail;
use Auth;
use App\Models;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    //function selects history
    public function index(){
       
        // if(Route::currentRouteName() == 'user.history.index'){
        //     $active = 'active';
        // }else{
        //     $active = 'active';
        // }
        return view('dashboard.history');
    }

    public function transfer(){
        $setMethod = Models\Admin::where('status', 'active')->first();
        $transactionMethod = $setMethod->link;
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;
       return view('dashboard.fundtransfer', compact('balance', 'transactionMethod'));
    }

    public function scheduledpayment(){
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;
       return view('dashboard.sheduledPayments', compact('balance'));
    }

    public function paymentsdue(){
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;
       return view('dashboard.paymentdue', compact('balance'));
    }

    public function changepassword(){
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;
       return view('dashboard.changepassword', compact('balance'));
    }

    public function updatepassword(Request $request){
        $request->validate([
            // 'old_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)->symbols()->numbers()->mixedCase()],
        ]);

        $request->user()->password =  Hash::make($request->password);
        $request->user()->save();
        return back()->with('message', 'You updated your password')->with('message-color', 'alert-success');
    }

    public function changepin(){
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;
       return view('dashboard.changepin', compact('balance'));
    }

    public function updatepin(Request $request){
        $request->validate([
            'old_password' => ['required', 'current_password'],
            'pin' => ['required', 'confirmed', Password::min(4)->numbers()],
        ]);

        $request->user()->pin =  $request->pin;
        $request->user()->save();
        return back()->with('message', 'You updated your transaction pin')->with('message-color', 'alert-success');
    }

    public function mail(){
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;
       return view('dashboard.mail', compact('balance'));
    }

    
    public function sendmail(Request $request){

        $request->validate([

            'message' => ['bail', 'required', 'string'],
            'subject' => ['bail', 'required', 'string'],
            'attachment' => ['bail', 'nullable', 'file'],
            'priority' => ['bail', 'nullable', 'string'],
        ]);
        // email attachment if exist before adding as attachment from disk to email
        if($request->file('attachment')->isValid()){
            $attachmentname = $request->user()->firstname.time().'.'.$request->file('attachment')->extension();
            $userFullname = $request->user()->firstname.'_'.$request->user()->lastname;
            
            $attachment = $request->file('attachment')->storeAS('users/mails/attachments/'.$userFullname, $attachmentname, 'public');    
            
        }

        $userName = $request->user()->firstname.' '.$request->user()->lastname;
        $userData = [ 
            'subject' => $request->subject,
            'email'  => $request->user()->email,
            'name'  => $userName,
            'message' => $request->message,
            'attachment' => $attachment ?? null,
            'priority' =>  $request->priority,
        ];


        Mail::to('support@tresorcrest.com')->send(new SendUserMail($userData));
        return back()->with('message', 'We have received your mail and will get back to you as soon as possible')->with('message-color', 'alert-success');
    }

}
