<?php

namespace App\Http\Controllers;

use App\Mail\OrderStatusUpdated;
use App\Models\Product;
use App\Models\ProductionOrder;
use App\Models\ProductionOrderDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProductionOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
/*     public function index()
    {
        $products = Product::all();
        Log::info($products);

        return view('productionorders.createorder', compact('products'));
    } */

    /**
     * Display a listing of the orders.
     */
    public function orders()
    {
        $productionorders = ProductionOrder::all();
        Log::info($productionorders);

        return view('productionorders.orders', compact('productionorders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workingOrders = ProductionOrder::all();
        //Log::info($products);
        Log::info('Create order');

        //return view('productionorders.createorder', compact('products'));
        return view('productionorders.createorder', compact('workingOrders'));
    }

    public function updateStatus($token)
    {
        // Find the order by its token
        $order = ProductionOrder::where('token', $token)->firstOrFail();

        // Update the status (e.g., mark as completed)
        $order->update(['status' => 'completed']);

        // Send an email notification
        Mail::to($order->customer_email)->send(new OrderStatusUpdated($order));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order status updated and email sent successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
   /*  public function store(Request $request)
    {
        Log::info('Request data:', $request->all());

        try {
            $request->validate([
                'orderNumber' => 'nullable|string',
                'productListNew' => 'required|array|min:1',
                'productListNew.*.id' => 'required|integer',
                'productListNew.*.quantity' => 'required|numeric',
            ]);

            $orderData = $request->except('productListNew');

            $orderData['token'] = $request->token;
            $productListNew = $request->input('productListNew', []);

            // Create new order
            $order = ProductionOrder::create($orderData);
            Log::info("Order: {$order}");

            // Save order details (products)
            foreach ($productListNew as $product) {
                ProductionOrderDetails::create([
                    'production_order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                ]);
            }
            // Send an email notification
            $order_send = ProductionOrder::where('token', $orderData['token'])->firstOrFail();
            Log::info("Order send: {$order_send}");
            Log::info("Order send: {$orderData['token']}");
            Mail::to($order_send->customer_email)->send(new OrderStatusUpdated($order));


            return response()->json(['message' => 'Order successfully saved!'], 200);
        } catch (Exception $e) {
            Log::error("Error: {$e->getMessage()}");
            return response()->json(['message' => 'An error occurred while saving the order.'], 500);
        }
    } */
    public function store(Request $request)
    {
        Log::info('Request data:', $request->all());

        try {
            $request->validate([
                'orderNumber' => 'nullable|string',
                'productListNew' => 'required|array|min:1',
                'productListNew.*.id' => 'required|integer',
                'productListNew.*.quantity' => 'required|numeric',
            ]);

            $orderData = $request->except('productListNew');

            // Ensure the token is being passed correctly



            $productListNew = $request->input('productListNew', []);

            // Create new order
            $order = ProductionOrder::create($orderData);
            Log::info("Order created:", ['order' => $order]);

            // Save order details (products)
            foreach ($productListNew as $product) {
                ProductionOrderDetails::create([
                    'production_order_id' => $order->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                ]);
            }


            //find token by
            $token = ProductionOrder::where('OrderNumber', $orderData['OrderNumber'])->firstOrFail();
            Log::info("Token fetched:", ['token' => $token->token]);
            $order_send = ProductionOrder::where('token', $token->token)->firstOrFail();
            Log::info("Order fetched:", ['order_send' => $order_send]);

            // Send an email notification
            //add customer email h.ahmet@pobjeda.com 


            if (!empty($order_send->customer_email)) {
                Mail::to($order_send->customer_email)->send(new OrderStatusUpdated($order));
            } else {
                Log::warning("Order does not have a customer email, using default email h.ahmet@pobjeda.com:", ['order' => $order_send]);
                Mail::to('h.ahmet@pobjeda.com')->send(new OrderStatusUpdated($order));
            }

            return response()->json(['message' => 'Order successfully saved!'], 200);
        } catch (Exception $e) {
            Log::error("Error: {$e->getMessage()}");
            return response()->json(['message' => 'An error occurred while saving the order.'], 500);
        }
    }

    /**
     * Get the next order number.
     */
    public function getOrderNumber()
    {
        $orderNumber = ProductionOrder::max('OrderNumber');
        $orderNumber = $orderNumber ? $orderNumber + 1 : 1;

        return response()->json(['orderNumber' => $orderNumber]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productionOrder = ProductionOrder::findOrFail($id);
        Log::info($productionOrder);
        //$products = ProductionOrderDetails::where('production_order_id', $id)->get();
        $products = ProductionOrderDetails::where('production_order_id', $id)
            ->join('products', 'production_order_details.product_id', '=', 'products.id')
            ->select('production_order_details.*', 'products.NumeraProizvoda')
            ->get();

        return view('productionorders.show', compact('productionOrder', 'products'));
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
    public function test()
    {
        return view('productionorders.test');
    }
}
