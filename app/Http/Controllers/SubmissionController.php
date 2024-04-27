<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SubmissionController extends Controller
{

    public function index($status) {
        // Check if the authenticated user is an admin
        if(Auth::user()->role == 'admin') {
            // If the user is an admin, fetch all submissions with the specified status
            $submissions = Submission::where('status', $status)->get();
            // Count submissions for each status
            $countExpired = Submission::where('status', 'expired')->count();
            $countActive = Submission::where('status', 'active')->count();
            $countPending = Submission::where('status', 'pending')->count();
        } else {
            // If the user is not an admin, fetch submissions owned by the user with the specified status
            $submissions = Submission::where('user_id', Auth::id())->where('status', $status)->get();

            // Count submissions for each status owned by the user
            $countExpired = Submission::where('user_id', Auth::id())->where('status', 'expired')->count();
            $countActive = Submission::where('user_id', Auth::id())->where('status', 'active')->count();
            $countPending = Submission::where('user_id', Auth::id())->where('status', 'pending')->count();
        }
        
        
        return view('submission.index', compact('submissions', 'status', 'countExpired', 'countActive', 'countPending'));
    }

    public function booking(Request $request, $place) {
        $validatedData = $request->validate([
            'date' => 'required|date',
        ]);
    
        if (!$validatedData) {
            // Tampilkan pesan kesalahan
            return back()->withErrors($validatedData)->withInput();
        }
    
        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
    
        // Check if there are any pending or expired submissions for the same date
        $existingSubmission = Submission::where('place_id', $place)
                                         ->where('donor_date', $date)
                                         ->where('status', 'pending')
                                         ->first();
    
        if ($existingSubmission) {
            return redirect()->route('submission.index', ['status' => 'pending'])->with('error', 'Pembuatan jadwal donor gagal karena jadwal pada tanggal tersebut sudah tersedia dan dalam proses persetujuan atau telah kedaluwarsa.');
        }
    
        // If no pending or expired submission exists, create a new submission
        $submission = new Submission();
        $submission->place_id = $place;
        $submission->donor_date = $date;
        $submission->user_id = Auth::user()->id;
        $submission->save();
    
        return redirect()->route('submission.index', ['status' => 'pending'])->with('success', 'Pembuatan jadwal donor berhasil, silahkan menunggu approve dari admin!');
    }
    

    public function cancel($id) {
        // Find the submission by its ID
        $submission = Submission::findOrFail($id);
    
        // Check if the submission belongs to the authenticated user
        if ($submission->user_id != Auth::user()->id) {
            return redirect()->route('submission.index')->with('error', 'Anda tidak memiliki izin untuk membatalkan jadwal donor ini.');
        }
    
        // Update the status to "expired"
        $submission->status = 'expired';
        $submission->save();
    
        // Redirect back to the submission index page with a success message
        return redirect()->route('submission.index', ['status' => 'pending'])->with('success', 'Pembatalan donor darah berhasil!');
    }
    
    public function approve($id) {
        // Find the submission by its ID
        $submission = Submission::findOrFail($id);
    
        // Update the status to "expired"
        $submission->status = 'active';
        $submission->save();
    
        // Redirect back to the submission index page with a success message
        return redirect()->route('submission.index', ['status' => 'active'])->with('success', 'Berhasil merubah status menjadi approve!');
    }

    public function admin_cancel($id) {
        // Find the submission by its ID
        $submission = Submission::findOrFail($id);
    
        // Update the status to "expired"
        $submission->status = 'expired';
        $submission->save();
    
        // Redirect back to the submission index page with a success message
        return redirect()->route('submission.index', ['status' => 'pending'])->with('success', 'Berhasil merubah status menjadi expired!');
    }
}
