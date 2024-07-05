<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function productSave(Request $request)
    {
       $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time().'_'.$originalImageName;
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        // Create a new product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('admin_dashboard')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        // return view('products.show', compact('product'));
        return view('products.show', ['product' => $product]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
