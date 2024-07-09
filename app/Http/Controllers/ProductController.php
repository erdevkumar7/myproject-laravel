<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /* ----------------------------------------------------------------------------------- */
    public function product_all()
    {
        $products = Product::all();
        return view('admin.product.all', compact('products'));
    }

    /* ----------------------------------------------------------------------------------- */
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
            $imageName = time() . '_' . $originalImageName;
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

        return redirect()->route('product_all')->with('success', 'Product created successfully.');
    }

    /* ----------------------------------------------------------------------------------- */
    public function product_show($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);
        // Pass the product to the view
        return view('admin.product.show', compact('product'));
    }

    /* ----------------------------------------------------------------------------------- */
    public function product_edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    /* ----------------------------------------------------------------------------------- */
    public function product_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
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
            'category' => $request->category,
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
