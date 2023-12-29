<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\Country;
class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        // Add your search logic here based on the $query
        // You may want to filter scholarships based on the search query
        $scholarships = Scholarship::where('name', 'like', "%$query%")->get();
        $countries = Country::all();
        return view('search', compact('scholarships', 'query','countries'));
    }
}
