<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    //

    public function index(){
        
        $credits = Auth::user()->passbooks->where('trans_type', 'credit')->sum('amount');
        $debits = Auth::user()->passbooks->where('trans_type', 'debit')->sum('amount');
        $balance = $credits - $debits;
        return view('dashboard.index', compact('balance'));
    }
}
