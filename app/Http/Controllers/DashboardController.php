<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Category, Submission, Place};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return view('setting');
    }

    public function profile(Request $request) {
        $user = Auth::user();

        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            // Add more validation rules if needed
        ]);
    
        // Update the user's profile details
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // Update other profile details as needed
        $user->save();
    
        // Redirect back to the profile page with a success message
        return redirect()->route('setting')->with('success', 'Profile updated successfully!');
    }

    public function dashboardAdmin(Request $request)
    {
        $userCount = User::count();
        $categoryCount = Category::count();
        $placeCount = Place::count();
        $submissionCount = Submission::count();
        $submissions = Submission::latest('created_at')
                                 ->limit(5)
                                 ->get();
    
        $places = Place::whereHas('category', function ($query) {
            $query->where('name', 'PMI');
        })->get();
        return view('admin.dashboard', compact('userCount', 'categoryCount', 'submissionCount', 'placeCount', 'places','submissions'));
    }

    public function changePassword(Request $request) {
        // Validate the incoming request data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }
    
        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        // Redirect back to the profile page with a success message
        return redirect()->route('setting')->with('success', 'Password changed successfully.');
    }
}
