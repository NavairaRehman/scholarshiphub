<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
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
}
