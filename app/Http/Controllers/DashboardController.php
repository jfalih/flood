<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Category, Submission, Place};
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $places = Place::whereHas('category', function ($query) {
            $query->where('name', 'PMI');
        })->get();

        $userId = Auth::id();

        // Retrieve the latest three submissions associated with the authenticated user
        $submissions = Submission::where('user_id', $userId)
                                 ->latest('created_at')
                                 ->limit(3)
                                 ->get();
    
        return view('dashboard', compact('places','submissions'));
    }

    public function setting() {
        return "S";
    }


    public function dashboardAdmin(Request $request)
    {
        $userCount = User::count();
        $categoryCount = Category::count();
        $placeCount = Place::count();
        $places = Place::whereHas('category', function ($query) {
            $query->where('name', 'PMI');
        })->get();
        return view('admin.dashboard', compact('userCount', 'categoryCount', 'placeCount', 'places'));
    }
}
