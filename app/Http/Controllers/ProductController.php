<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Session;
use Picqer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product_code=rand(106890122,100000000);
        $redColor='255,0,0';
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes=$generator->getBarcode($product_code,
        $generator::TYPE_STANDARD_2_5,2,60);
        $product = new Product();
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->brand=$request->brand;
        $product->quantity=$request->quantity;
        $product->product_code=$product_code;
        $product->barcode=$barcodes;
        //$product->alert_stock=$request->alert_stock;
        $product->category_id=$request->category;

        if($request->hasFile('image')){
            $image=$request->image;
            $imeganame=time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imeganame);
            $product->image='uploads/'.$imeganame;
        }
        $product->save();

        return redirect()->route('products.index')->with('success','Ürün başarıyla eklendi.');;
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
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::get();
        return view('admin.product.update',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request,$id)
    {
        $product_code=rand(106890122,100000000);
        $redColor='255,0,0';
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcodes=$generator->getBarcode($product_code,
        $generator::TYPE_STANDARD_2_5,2,60);

        $product = Product::findOrFail($id);
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->brand=$request->brand;
        $product->quantity=$request->quantity;
        $product->product_code=$product_code;
        $product->barcode=$product_code . 'jpg';
        //$product->alert_stock=$request->alert_stock;
        $product->category_id=$request->category;

        if($request->hasFile('image')){
            $image=$request->image;
            $imeganame=time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imeganame);
            $product->image='uploads/'.$imeganame;
        }
        $product->save();

        return redirect()->route('products.index')->with('success','Ürün başarıyla güncellendi.');;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);

        $product = Product::find($request->id); // Sileceğiniz ürünü veritabanından alın

        if ($product) {
            $product->delete(); // Ürünü sil
            $order=Order::where('product_id',$product->id);
            $order->delete();
            return redirect()->route('products.index')->with('success','Ürün başarıyla silindi.');;
        }
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        //
    }
    public function GetBarcodes(Request $request)
    {
        $productsBarcode=Product::where('barcode','product_code')->get();
        return view('admin.product.barcode.index',compact('productsBarcode'));
    }
}

