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

        $product=Product::all();
        $orders=Order::all();
        return view('admin.orders.index',['product'=>$product,'orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $product=Product::all();
        $orders=Order::all();
        return view('admin.orders.create',['product'=>$product,'orders'=>$orders]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $orders= new Order();
        $orders->address=$request->address;
        $orders->product_id=$request->product_id;
        $orders->save();

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
