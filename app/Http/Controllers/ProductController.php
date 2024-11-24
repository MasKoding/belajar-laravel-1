<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Products::latest()->get();

        return Inertia::render("Products/Index",[
            'products'=>$products
        ]);
    }

    public function create(){
        return inertia("Products/Create");
    }

    public function store(Request $request){
       $validated = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'qty'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;

        }
        Products::create($validated);

        return redirect()->route("products.index")->with('success','Data berhasil di simpan!');

    }

    public function edit(Products $product){
        return inertia("Products/Edit",[
            "product"=>$product
        ]);

    }

    public function update(Request $request,Products $products){
        $validated = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category'=>'required',
            'qty'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;

        }
        $products->update($validated);
        
        return redirect()->route("products.index")->with('success','Data berhasil di update!');

    }
    public function destroy(Products $product){
        $product->delete();

        return redirect()->route("products.index")->with('success','Data berhasil di delete!');

    }
}
