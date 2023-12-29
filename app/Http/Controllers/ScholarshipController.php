<?php

namespace App\Http\Controllers;
use App\Models\Scholarship;
use App\Models\Country;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    public function index(){
        $countries = Country::all();
        $scholarships = Scholarship::with('country', 'category')->get();
        return view('scholarships', compact('scholarships','countries'));
    }
}
