<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomepage(){
        return view('frontend.homepage');
    }
}
