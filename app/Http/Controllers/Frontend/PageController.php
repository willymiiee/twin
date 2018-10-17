<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomepage(){
        return view('Frontend.pages.homepage');
    }
    public function showAbout(){
        return view('Frontend.pages.about');
    }
    public function showTeam(){
        return view('Frontend.pages.team');
    }
    public function showInfrastructure(){
        return view('Frontend.pages.infrastructure');
    }
}
