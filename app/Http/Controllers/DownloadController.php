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
}
