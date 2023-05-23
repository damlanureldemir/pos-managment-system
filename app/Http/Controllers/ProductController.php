<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use File;

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

        $product = new Product();
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->brand=$request->brand;
        $product->quantity=$request->quantity;
        //$product->alert_stock=$request->alert_stock;
        $product->category_id=$request->category;

        if($request->hasFile('image')){
            $image=$request->image;
            $imeganame=time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imeganame);
            $product->image='uploads/'.$imeganame;
        }
        $product->save();

        $all = $request->except('token');

        return redirect()->back();
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

