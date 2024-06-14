<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            'status' => true,
            'data' => $categories,
        ]);
    }

    public function places($id)
    {
        $category = Category::with('places')->find($id);
    
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found',
            ], 404);
        }
    
        return response()->json([
            'status' => true,
            'data' => $category->places,
        ]);
    }
}
