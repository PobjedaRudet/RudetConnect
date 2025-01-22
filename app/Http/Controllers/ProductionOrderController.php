<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        Log::info($products);

        return view('productionorders.createorder', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();

        Log::info($products);
        Log:info('Create order');

        return view('productionorders.createorder', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //spasi kreiranu formu
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'due_date' => 'required',
        ]);
        //spremi podatke u bazu
        ProductionOrder::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductionOrder $productionOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductionOrder $productionOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductionOrder $productionOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductionOrder $productionOrder)
    {
        //
    }
}
