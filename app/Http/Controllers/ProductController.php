<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
//        $product = Product::all();
        //  $product = Product::latest()   // عشان يجبلي من الاحدث للاقدم
        $products = Product::latest()->paginate(4);  // ->paginate(4) عشان لو الصفحه فيها منتجات كتير هتهنج مني ف بقسمها علي صفحات
//        return view('product.index' , ['myproduct'=>$product]);
        return view('product.index', compact('products'));  // product هو نفس اسم ال $product ولكن من غير علامه الدولار $
    }

    public function trashedProducts()
    {
        $products = Product::onlyTrashed()->latest()->paginate(4);  // ->paginate(4) عشان لو الصفحه فيها منتجات كتير هتهنج مني ف بقسمها علي صفحات

        return view('product.trash', compact('products'));  // product هو نفس اسم ال $product ولكن من غير علامه الدولار $
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate($request,[   // عشان اتحقق هو دخل الداتا اللي انا طالبها ولا لا
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required',
        ]);
        Product::create($request->all());
        return redirect(route('products.index'))->with('success', 'product created successfully');
        // products دي اللي موجوده فال route بتاع web.php
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
//        $product = Product::all();
        return view('product.edit', compact('product')); // product هو نفس اسم ال $product ولكن من غير علامه الدولار $
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([   // عشان اتحقق هو دخل الداتا اللي انا طالبها ولا لا
            'name' => 'required',
            'price' => 'required',
            'detail' => 'required',
        ]);
        $product->update($request->all());
        return redirect(route('products.index'))->with('success', 'product updated successfully');
    // products دي اللي موجوده فال route بتاع web.php
}

//    public function destroy(Product $product)
//    {
//        $product->delete();
//        return redirect(route('products.index'))->with('success' , 'product deleted successfully');
//        // products دي اللي موجوده فال route بتاع web.php
//    }

    public function softDelete($id)
    {
       Product::find($id)->delete();
        return redirect(route('products.index'))->with('success' , ' product Soft deleted successfully');
        // products دي اللي موجوده فال route بتاع web.php
    }

    public function deleteForEver($id)
    {
        Product::onlyTrashed()->where('id' ,$id)->forceDelete();
        return redirect(route('product.trash'))->with('success' , ' product Soft deleted successfully');
        // products دي اللي موجوده فال route بتاع web.php
    }

    public function backFromSoftDelete($id)
    {
        $products = Product::onlyTrashed()->where('id' ,$id)->first()->restore();
        return redirect(route('products.index'))->with('success' , ' product back FromSoft Deleted successfully');
        // products دي اللي موجوده فال route بتاع web.php
    }
}
