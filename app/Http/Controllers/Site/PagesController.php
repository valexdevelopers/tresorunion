<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function index(){
        return view('site.index');
    }


    public function about(){
        return view('site.about');
    }

    public function contact(){
        return view('site.contact');
    }

    public function news(){
        return view('site.news');
    }

    public function support(){
        return view('site.support');
    }

    public function fallback(){
        return view('site.fallback');
    }
}
