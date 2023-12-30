<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Scholarship;

class CountryController extends Controller
{
    public function show($id)
    {
        // Find the country by ID
        $country = Country::find($id);

        // Check if the country exists
        if (!$country) {
            abort(404);
        }

        // Get all scholarships related to the country
        $scholarships = Scholarship::where('country_id', $country->id)->get();

        // Get all countries (you might want to adjust this based on your needs)
        $countries = Country::all();

        return view('scholarships', compact('country', 'scholarships', 'countries'));
    }
}
