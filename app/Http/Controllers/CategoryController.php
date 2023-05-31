<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category= Category::findOrFail($request->id);
        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category= new Category;
        $category->name=$request->category;
        $category->save();

        return redirect()->back()->with('success','Kategori Başarıyla Oluşturuldu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function delete($id)
    {
        $category = Category::find($id); // Sileceğiniz ürünü veritabanından alın

        if ($category) {
            $category->delete(); // Ürünü sil
            Session::flash('message',"ürün başarıyla silindi");
            Session::forget('message');
            return redirect()->route('category.index')->with('success','Ürün başarıyla silindi.');
        }
        Session::flash('message',"ürün bulunamadı");
        Session::forget('message');
        return redirect()->route('category.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
