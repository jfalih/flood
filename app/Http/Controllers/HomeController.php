<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Place};
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Menampilkan halaman utama dengan kategori dan 10 tempat teratas
    public function index() {
        $categories = Category::all(); // Mengambil semua kategori
        $places = Place::limit(10)->get(); // Mengambil 10 tempat teratas

        return view('home', compact('categories', 'places')); // Mengirim data kategori dan tempat ke view 'home'
    }

    // Menampilkan halaman 404
    public function notFound() {
        return view('404'); // Mengembalikan view '404'
    }

    // Mencari tempat berdasarkan kata kunci dan kategori
    public function search(Request $request) {
        $keyword = $request->input('keyword'); // Mendapatkan kata kunci dari request
        $selectedCategories = $request->input('categories', []); // Mendapatkan ID kategori dari request, default ke array kosong jika tidak disediakan
        $page = $request->input('page') ?? 1; // Mendapatkan nomor halaman dari request, default ke 1 jika tidak disediakan
    
        $query = Place::query(); // Membuat query untuk tempat
    
        // Jika kata kunci disediakan, mencari tempat berdasarkan nama
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
    
        // Jika ID kategori disediakan, memfilter tempat berdasarkan kategori
        if (!empty($selectedCategories)) {
            $query->whereIn('category_id', $selectedCategories);
        }

        // Mem-paginate hasil dengan 10 tempat per halaman
        $places = $query->paginate(4, ['*'], 'page', $page);
    
        // Jika tidak ada hasil, kembalikan halaman 404
        if ($places->isEmpty()) {
            return view('404');
        }

        // Mengambil semua kategori
        $categories = Category::all(); // Diasumsikan terdapat tabel 'categories'
    
        // Mengirim data kategori, tempat, kata kunci, dan kategori terpilih ke view 'search'
        return view('search', compact('categories', 'places', 'keyword', 'selectedCategories'));
    }
}
