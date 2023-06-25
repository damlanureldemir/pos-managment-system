<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
        $post = Order::find();
        $order= $post->order;

        echo $order->name;
        **/
        $products=Product::all();
        $orders=Order::all();
        return view('admin.orders.index',['products'=>$products,
            'orders'=>$orders,
            'order_receipt=>$order_receipt']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();
        DB::transaction(function () use ($request) {


            //order modal
            $orders = new Order();
            $orders->name = $request->customer_name;
            $orders->phone = $request->customer_phone;
            $orders->save();
            $order_id = $orders->id;
            //order details modal
            for ($product_id = 0; $product_id < count($request->product_id); $product_id++) {
                $order_details = new Order_Detail;
                $order_details->order_id = $order_id;
                $order_details->product_id = $request->product_id[$product_id];
                $order_details->unit_price = $request->price[$product_id];
                $order_details->quantity = $request->quantity[$product_id];
                $order_details->discount = $request->discount[$product_id];
                $order_details->amount = $request->total_amount[$product_id];
                $order_details->save();
            }

            //transaction modal#
            $transaction = new Transaction();
            $transaction->order_id = $order_id;
            $transaction->user_id = auth()->user()->id;
            $transaction->balance = $request->balance;
            $transaction->paid_amount = $request->paid_amount;
            $transaction->payment_method = $request->payment_method;
            $transaction->transact_amount = $order_details->amount;
            $transaction->transact_date = date('Y-m-d');
            $transaction->save();

            //last order history
            $products = Product::all();
            $order_details = Order_Detail::where('order_id', $orders->id)->get();
            $orders= new Order();
            $orders->address=$request->address;
            $orders->product_id=$request->product_id;
            $orders->save();
            $orderedBy = Order::where('id', $order_id)->get();

            return view('orders.index', [
                'products' => $products,
                'order_details' => $order_details,
                'customer_orders' => $orderedBy
            ]);

        });
        return back()->with("siparis eklenemiyor");
        return redirect()->back()->with('success','Kategori Başarıyla Oluşturuldu');
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
    public function delete($id)
    {
        $orders = Order::find($id); // Sileceğiniz ürünü veritabanından al

        if ($orders) {
            $orders->delete(); // Ürünü sil
            return redirect()->route('orders.index')->with('success','Ürün başarıyla silindi.');
        }
        return redirect()->route('orders.index');
    }
    public function destroy(Order $order)
    {
        //
    }
}
