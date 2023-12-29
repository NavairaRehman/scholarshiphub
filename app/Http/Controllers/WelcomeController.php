<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Country;
class WelcomeController extends Controller
{
    //
    public function index()
    {
        $countries = Country::all(); // Assuming you have a Country model

        return view('welcome', compact('countries'));
    }
}
