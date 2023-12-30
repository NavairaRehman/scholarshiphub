<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
class CountryController extends Controller
{
    public function show($id)
    {
        $country = Country::all($id);
        $scholarships = $country->scholarships; // Assuming a relationship exists

        return view('scholarships', compact('country', 'scholarships'));
    }
}