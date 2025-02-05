<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductionOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ProductionOrderDetails;

class ProductionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$products = Product::all();
       // Log::info($products);

       // return view('productionorders.createorder', compact('products'));
       return view('productionorders.createorder');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        Log::info($products);
        Log::info('Create order');

        return view('productionorders.createorder', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(Request $request)
    {
        Log::info("Request: " . json_encode($request->all()));
        try {
            $validatedData = $request->validate([
                'OrderNumber' => 'required|string',
                'OrderDate' => 'required|date',
                'Description' => 'required|string',
                'Metraza' => 'required|numeric',
                'Status' => 'required|string',
                'VrstaProvodnika' => 'required|string',
                'Tip' => 'required|string',
                'BojaDuzinaProvodnika' => 'required|string',
                'Pakovanje' => 'required|string',
                'AtestPaketa' => 'required|string',
                'CeOznaka' => 'required|string',
                'KlasaOpasnosti' => 'required|string',
                'UNBroj' => 'required|string',
                'RokIsporuke' => 'required|string',
                'DatumPredaje' => 'required|date',
                'DatumPrijema' => 'required|date',
                'Napomena' => 'required|string',
                'products' => 'required|array|min:1',
            ]);
            Log::info("Validacija: " . json_encode($validatedData));

            // Kreiraj novi nalog
            $order = ProductionOrder::create($validatedData);
            Log::info("Order: {$order}");
            // Sačuvaj detalje naloga (proizvode)
            foreach ($request->products as $product) {
                ProductionOrderDetails::create([
                    'production_order_id' => $order->id,
                    'product_id' => $product['productId'],
                    'product_value' => $product['productValue'],
                ]);
            }

            return response()->json(['message' => 'Nalog je uspešno sačuvan!'], 200);
        } catch (\Exception $e) {
            Log::error("Greška: {$e->getMessage()}");
          //  return response()->json(['message' => 'Došlo je do greške prilikom čuvanja naloga.'], 500);
        }
    } */

    public function store(Request $request)
    {
        Log::info('Request data:', $request->all());

        try {
            $validatedData = $request->validate([
                'orderNumber' => 'nullable|string',
                'productListNew' => 'required|array|min:1',
                'productListNew.*.id' => 'required|integer',
                'productListNew.*.vrijednost' => 'required|numeric',
            ]);

            $orderData = $request->except('productListNew');
            $productListNew = $request->input('productListNew', []);

            // Kreiraj novi nalog
            $order = ProductionOrder::create($orderData);
            Log::info("Order: {$order}");

            // Sačuvaj detalje naloga (proizvode)
            foreach ($productListNew as $product) {
                ProductionOrderDetails::create([
                    'production_order_id' => $order->id,
                    'product_id' => $product['id'],
                    'product_value' => $product['vrijednost'],
                ]);
            }

            return response()->json(['message' => 'Nalog je uspešno sačuvan!'], 200);
        } catch (\Exception $e) {
            Log::error("GreškaNew: {$e->getMessage()}");
            return response()->json(['message' => 'Došlo je do greške prilikom čuvanja naloga.'], 500);
        }
    }

    public function getOrderNumber()
    {
        $orderNumber = ProductionOrder::max('OrderNumber');
        $orderNumber = $orderNumber ? $orderNumber + 1 : 1;

        return response()->json(['orderNumber' => $orderNumber]);
    }



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

    /**
     * Show the form for uploading an order.
     */
    public function uploadorder()
    {
        return view('productionorders.uploadorder');
    }
}
