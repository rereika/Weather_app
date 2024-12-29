<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function backHome(){
        return view('Weather_app.home');
    }
}
