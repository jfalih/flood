<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Submission;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function booking(Request $request, $place) {
        // Validate input data
        $validatedData = $request->validate([
            'date' => 'required',
        ]);
    
        if (!$validatedData) {
            // Return errors as JSON response
            return response()->json(['status' => false, 'data' => $validatedData, 'message' => 'failed validated data!'], 400);
        }
    
        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
    
        // Check if there are any pending or expired submissions for the same date
        $existingSubmission = Submission::where('place_id', $place)
                                        ->where('donor_date', $date)
                                        ->where('status', 'pending')
                                        ->first();
    
        if ($existingSubmission) {
            // Return error message as JSON response
            return response()->json([
                'status' => false,
                'data' => [],
                'message' => "Sudah membuat jadwal donor!"
            ], 400);
        }
    
        // Create a new submission
        $submission = new Submission();
        $submission->place_id = $place;
        $submission->donor_date = $date;
        $submission->user_id = Auth::user()->id;
        $submission->save();
    
        // Return success message as JSON response
        return response()->json([
            'status' => true,
            'data' => $submission,
            'message' => 'Pembuatan jadwal donor berhasil, silahkan menunggu approve dari admin!'
        ], 200);
    }

    public function detail(Request $request, $submission)
    {
        // Find the place by ID
        $sub = Submission::with('place')->find($submission);

        // Check if place exists
        if (!$sub) {
            return response()->json([
                'status' => false,
                'message' => 'Place not found',
            ], 404);
        }

        // Return place details as JSON response
        return response()->json([
            'status' => true,
            'data' => $sub,
            'message' => 'Place details retrieved successfully',
        ], 200);
    }

    public function history()
    {
        // Get the currently authenticated user's ID
        $userId = Auth::guard('api')->user()->id;

        // Retrieve all submissions for the authenticated user
        $submissions = Submission::where('user_id', $userId)->with('place')->get();

        // Return the submissions as JSON response
        return response()->json([
            'status' => true,
            'data' => $submissions,
            'message' => 'Submission history retrieved successfully',
        ], 200);
    }
}
