<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

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

        return redirect()->back()->with('success','Sipariş Başarıyla Oluşturuldu');
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
    public function edit($id)
    {
        $orders=Order::find($id);
        $product=Product::get();
        return view('admin.orders.update',compact('product','orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $orders=Order::findOrFail($id);
        $orders->address=$request->address;
        $orders->product_id=$request->product_id;
        $orders->save();

        return redirect()->route('orders.index')->with('success','Ürün başarıyla güncellendi.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $orders = Order::find($id); // Sileceğiniz ürünü veritabanından al

        if ($orders) {
            $orders->delete(); // Ürünü sil
            return redirect()->route('orders.index')->with('success','Sipariş başarıyla silindi.');
        }
        return redirect()->route('orders.index');
    }
    public function destroy(Order $order)
    {
        //
    }
}
