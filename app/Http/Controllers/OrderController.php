<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer', 'productItems')->get();
        return view('orders.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = User::where('role', 'Customer')->get();
        $products = Product::all();
        return view('orders.create', [
            'customers' => $customers,
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //----
            $products = collect($request->products)->map(function($value, $index) {
                $product = Product::where('id', $value['product_id'])->first();
                $price = 0;
                $total = 0;
                if ($product) {
                    $price = $product->price;
                    $total = $product->price * $value['quantity'];
                }
                return [...$value, 'price' => $price, 'total' => $total];
            });
            //----
            $order = Order::create([
                'user_id' => $request->user_id,
                'date' => Carbon::now()->format('Y-m-d'),
                'amount' => $products->pluck('total')->sum(),
                'final_amount' => $products->pluck('total')->sum(),
                'state' => Order::PAID
            ]);
            //----
            $products->each(function($value, $index) use ($order) {
                ProductOrder::create([
                    'order_id' => $order->id,
                    ...$value
                ]);
            });
            //----
            return redirect()->route('orders.index')
                    ->with('success', 'Order successfully registered!');
        } catch (\Throwable $th) {
            DB::rollBack();
            //----
            return redirect()->route('orders.index')
                    ->with('error', 'An error occurred!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
