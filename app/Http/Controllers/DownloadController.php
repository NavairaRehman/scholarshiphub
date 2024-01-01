<?php

namespace App\Http\Controllers;
use App\Models\Downloads;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index(){
        $downloads = Downloads::all();
        return view("download", compact('downloads'));
    }
    public function search(Request $request){
        $query = $request->input('query');
        // Add your search logic here based on the $query
        // You may want to filter scholarships based on the search query
        $downloads = Downloads::where('name', 'like', "%$query%")->get();
        
        return view('download', compact('downloads'));
    }
}
