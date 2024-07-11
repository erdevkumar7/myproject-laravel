<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function category_all()
    {
        $categories = Category::all();
        return view('category.all', compact('categories'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function category_save(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // Handle image
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $originalImageName;
            $image->move(public_path('images/category'), $imageName);
        } else {
            $imageName = null;
        }

        // add category
        Category::create([
            'name' => $req->name,
            'type' => $req->type,
            'description' => $req->description,
            'image' => $imageName
        ]);

        return redirect()->route('category_all')->with('success', 'Category successfully created');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $category = Category::findOrFail($id);
        // Handle image
        if ($req->hasFile('image')) {
            //delete the old file if exist
            if ($category->image) {
                $oldImagePath = public_path('images/category/') . $category->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $req->file('image');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $originalImageName;
            $image->move(public_path('images/category'), $imageName);
        } else {
            $imageName = null;
        }

        $category->update([
            'name'=> $req->name,
            'type'=> $req->type,
            'description'=> $req->description,
            'image'=> $imageName
        ]);

        return redirect()->route('category_all')->with('success', 'Category Added successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if($category->image){
            $imagePath = public_path('images/category/').$category->image;
            if(file_exists($imagePath)){
                unlink($imagePath);
            }

            $category->delete();

            return redirect()->route('category_all')->with('success', 'Category deleted');
        }
    }


}
