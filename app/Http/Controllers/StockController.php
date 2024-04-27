<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Stock, Place};

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        $places = Place::whereHas('category', function ($query) {
            $query->where('name', 'PMI');
        })->get();
        return view('admin.stocks.index', compact('stocks', 'places'));
    }

    // Show the form for creating a new category
    public function create()
    {
        $places = Place::whereHas('category', function ($query) {
            $query->where('name', 'PMI');
        })->get();
        return view('admin.stocks.create', compact('places'));
    }

    // Store a newly created stock in the database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|unique:stocks',
            'A_plus' => 'required|integer|min:0',
            'A_minus' => 'required|integer|min:0',
            'B_plus' => 'required|integer|min:0',
            'B_minus' => 'required|integer|min:0',
            'AB_plus' => 'required|integer|min:0',
            'AB_minus' => 'required|integer|min:0',
            'O_plus' => 'required|integer|min:0',
            'O_minus' => 'required|integer|min:0',
            'place_id' => 'required|exists:places,id', // Ensure the place_id exists in the 'places' table
        ]);

        // Create the stock
        $stock = Stock::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('stocks.index')->with('success', 'Stock created successfully.');
    }


    // Show the form for editing the specified stock
    public function edit($id)
    {
        $stock = Stock::findOrFail($id);
        return view('admin.stocks.edit', compact('stock'));
    }

    // Update the specified stock in the database
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|unique:stocks,name,'.$id,
            'A_plus' => 'required|integer|min:0',
            'A_minus' => 'required|integer|min:0',
            'B_plus' => 'required|integer|min:0',
            'B_minus' => 'required|integer|min:0',
            'AB_plus' => 'required|integer|min:0',
            'AB_minus' => 'required|integer|min:0',
            'O_plus' => 'required|integer|min:0',
            'O_minus' => 'required|integer|min:0',
            'place_id' => 'required|exists:places,id', // Ensure the place_id exists in the 'places' table
        ]);

        // Find the stock by ID and update its attributes
        $stock = Stock::findOrFail($id);
        $stock->update($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully.');
    }

    // Delete the specified stock from the database
    public function destroy($id)
    {
        // Find the stock by ID and delete it
        $stock = Stock::findOrFail($id);
        $stock->delete();

        // Redirect to the index page with a success message
        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully.');
    }

    public function place(Request $request)
    {
        $placeId = $request->input('place_id');
        $stocks = Stock::where('place_id', $placeId)->get();
    
        return response()->json($stocks);
    }
}
