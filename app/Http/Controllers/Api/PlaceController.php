<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::with('category')->get();
        return response()->json([
            'status' => true,
            'data' => $places,
        ]);
    }

    public function recommendation()
    {
        $places = Place::with('category')->limit(5)->get();
        return response()->json([
            'status' => true,
            'data' => $places,
        ]);
    }
}
