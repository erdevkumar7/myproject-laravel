<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /* ----------------------------------------------------------------------------------- */
    public function product_all()
    {
        $products = Product::with('category')->orderBy('created_at')->get();
        dd($products);
        return view('product.all', compact('products'));
    }
    
    
    
     /* ----------------------------------------------------------------------------------- */
    public function add()
    {
        $categories = Category::all();
        return view('product.add', compact('categories'));
    }

    /* ----------------------------------------------------------------------------------- */
    public function productSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $originalImageName;
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null;
        }

        // Create a new product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('product_all')->with('success', 'Product created successfully.');
    }

    /* ----------------------------------------------------------------------------------- */
    public function product_show($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);
        // Pass the product to the view
        return view('product.show', compact('product'));
    }

    /* ----------------------------------------------------------------------------------- */
    public function product_edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /* ----------------------------------------------------------------------------------- */
    public function product_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the existing product
        $product = Product::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                $oldImagePath = public_path('images') . '/' . $product->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload the new image
            $image = $request->file('image');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $originalImageName;
            $image->move(public_path('images'), $imageName);
        } else {
            // Keep the old image if no new image is uploaded
            $imageName = $product->image;
        }

        // Update the product
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()->route('product_all')->with('success', 'Product updated successfully.');
    }

    /* ----------------------------------------------------------------------------------- */
    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the associated image if it exists
        if ($product->image) {
            $imagePath = public_path('images') . '/' . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the product from the database
        $product->delete();

        return redirect()->route('product_all')->with('success', 'Product deleted successfully.');
    }
}
