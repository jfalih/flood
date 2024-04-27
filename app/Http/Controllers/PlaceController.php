<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Place, Category, Submission};
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    public function index(Request $request) {
        $page = $request->input('page') ?? 1;
        $places = Place::paginate(5, ['*'], 'page', $page);
        $page = $request->input('page') ?? 1; // Mendapatkan nomor halaman dari request, default ke 1 jika tidak disediakan
        
        return view('admin.places.index', compact('places'));
    }

    public function create() {

        $categories = Category::all();
        return view('admin.places.create', compact('categories'));
    }

    // Store a newly created category in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category_id' => 'required',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image file
        ]);

        // Upload images
        $imagePaths = [];
        for ($i = 1; $i <= 4; $i++) {
            $imageKey = 'image' . $i;
            $imageName = time() . $i . '.' . $request->$imageKey->getClientOriginalExtension();
            $request->$imageKey->storeAs('public/images', $imageName);
            $imagePaths[$imageKey] = $imageName;
        }

        // Create new place
        Place::create(array_merge($request->except(['_token', 'image1', 'image2', 'image3', 'image4']), $imagePaths));
        return redirect()->route('place.index')->with('success', 'Place created successfully.');
    }

        
    public function detail($id) {
        // Mengambil tempat berdasarkan ID
        $place = Place::find($id);
    
        // Memeriksa apakah tempat ditemukan
        if (!$place) {
            // Tempat tidak ditemukan, mungkin menampilkan pesan kesalahan atau mengarahkan pengguna kembali
            return redirect()->route('404');
        }
        
          // Check if the user is authenticated
        if (Auth::check()) {
            // Get today's date in the format 'Y-m-d'
            $todayDate = Carbon::today()->format('Y-m-d');

            // Get submissions for the authenticated user for today's date
            $submission = Submission::where('user_id', Auth::user()->id)
                                    ->whereDate('donor_date', $todayDate)
                                    ->where('status', 'active')
                                    ->first();
        } else {
            $submission = null; // If user is not authenticated, set submission to null
        }
        // Mengirim data tempat ke tampilan detail
        return view('places.detail', compact('place', 'submission'));
    }
}
