<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $product;



    public function index()
    {
        $products = DB::select("SELECT * FROM products");
        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $storerequest = $request;
        $storerequestname = $request->name;
        $storerequestdescription = $request->description;
        $storerequestprice = $request->price;
        DB::insert("INSERT INTO products (name, description) VALUES ('$request->name', '$request->description')");
        return redirect()->route('products.index')
            ->with('success', 'Product created.');
    }




    public function show($id)
    {
        $product = DB::select("SELECT * FROM products WHERE id = $id")[0];
        $dscription = $product->description;
        return view('products.show', compact('product', 'dscription'));
    }

    public function edit($id)
    {
        $product = DB::select("SELECT * FROM products WHERE id = $id")[0];
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $productId = $id;
        DB::update("UPDATE products SET name = '$request->name', description = '$request->description' WHERE id = $id");
        return redirect()->route('products.index')
            ->with('success', 'Product updated.');
    }

    public function destroy($id)
    {
        DB::delete("DELETE FROM products WHERE id = $id");
        return redirect()->route('products.index')
            ->with('success', 'Product deleted.');
    }
}
