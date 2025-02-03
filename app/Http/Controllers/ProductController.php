<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Log::info('Action taken');
        $query = $request->input('query');
        $products = Product::where('SkraceniNaziv', 'LIKE', "%{$query}%")->get();
        return response()->json($products);
    }
    public function numeredlist(Request $request)
    {
        Log::info('Action taken3');
        $query = $request->input('query');
        $numera = $request->input('uom_meter');
        $provodnik = $request->input('provodnik');
        $tip = $request->input('tip');
        $products = Product::where('SkraceniNaziv', '=', "{$query}")
                   ->where('uom_meter', $numera)
                   ->where('VrstaProvodnika', $provodnik)
                   ->where('Tip', $tip)
                   ->get();
                   Log::info($products);
        return response()->json($products);
    }
    public function numeredlistBihnel(Request $request)
    {
        Log::info('Action taken4');
        $query = $request->input('query');
        $products = Product::where('SkraceniNaziv', '=', "{$query}")
                   ->get();
                   Log::info($products);
        return response()->json($products);
    }

    public function getCeOznaka(Request $request)
    {
        Log::info('Action Ce');
        $naziv = $request->input('naziv');
        $provodnik = $request->input('vrstaProvodnika');

        $ce = Product::where('SkraceniNaziv', 'LIKE', "%{$naziv}%")
        ->where('VrstaProvodnika', $provodnik)
        ->first();
        return response()->json($ce);
    }

    public function getCeOznakaBihnel(Request $request)
    {
        Log::info('Action Ce Bihnel');
        $naziv = $request->input('naziv');
        $ce = Product::where('SkraceniNaziv', 'LIKE', "%{$naziv}%")
        ->first();
        Log::info($ce);
        return response()->json($ce);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

}
