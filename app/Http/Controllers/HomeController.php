<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return auth()->check() ? view('welcome') : view('welcome');
    }
}
