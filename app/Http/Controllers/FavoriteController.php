<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $userFavorites = auth()->user()->favorites;
        return view('favorites', compact('userFavorites'));
    }
    public function addToFavorites(Request $request)
    {
        $scholarshipId = $request->scholarship_id;
        $userId = Auth::id();

        // Check if the scholarship is not already in favorites
        if (!Favorites::where('user_id', $userId)->where('scholarship_id', $scholarshipId)->exists()) {
            // Add the scholarship to favorites
            Favorites::create([
                'user_id' => $userId,
                'scholarship_id' => $scholarshipId,
            ]);

            return redirect()->back()->with('success', 'Scholarship added to favorites successfully.');
        }

        return redirect()->back()->with('info', 'Scholarship is already in favorites.');
    }
    
    public function removeFromFavorites(Request $request)
    {
        // Validate the request
        $request->validate([
            'favorite_id' => 'required|exists:favourites,id',
        ]);

        // Get the favorite
        $favorite = Favorites::find($request->favorite_id);

        // Check if the authenticated user owns this favorite
        if ($favorite->user_id == auth()->id()) {
            // Remove the favorite
            $favorite->delete();

            return redirect()->back()->with('success', 'Removed from favorites successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized action.');
    }
}
