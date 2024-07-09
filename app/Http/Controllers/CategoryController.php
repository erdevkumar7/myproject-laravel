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
            'name'=> 'required',
            'type'=>'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        

        // Handle image
        if($req->hasFile('image')){
            $image = $req->file('image');
            $originalImageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $originalImageName;
            $image->move(public_path('images/category'), $imageName);
        }else{
            $imageName = null;
        }

        // add category
        Category::create([
            'name'=> $req->name,
            'type'=> $req->type,
            'description'=> $req->description,
            'image'=> $imageName
        ]);

        return redirect()->route('category_all')->with('success', 'Category successfully created');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('category.show', compact('category'));
    }
}