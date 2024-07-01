<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
	public function allposts()
	{
		$allposts = DB::table('posts')->get(); // table function
		// $allposts = Post::all();
		// return response()->json($allposts);
		return view('posts.allposts', compact('allposts'));
	}

	public function createpost()
	{
		return view('posts.createposte');
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'description' => 'required',
		]);
		// Post::create($request->all());
		$post = new Post();
		$post->title = $request->title;
		$post->description = $request->description;
		$post->save();
		return redirect()->route('posts.allposts')->with('success', 'Post created successfully.');
	}

	public function show($id)
	{
		$post = Post::find($id);
		if (!$post) {
			return response()->json(['message' => 'Post not found'], 404);
		}
		// return response()->json($post);
		return view('posts.show', ['post' => $post]);
	}

	public function edit($id)
	{
		$post = Post::find($id);
		if (!$post) {
			return response()->json(['message' => 'Post not found'], 404);
		}
		return view('posts.edit', ['post' => $post]);
	}

	public function update(Request $request, $id)
	{
		$post = Post::find($id);
		if (!$post) {
			return response()->json(['message' => 'Post not found'], 404);
		}
		$request->validate([
			'title' => 'required|string',
			'description' => 'required|string',
		]);

		$post->title = $request->title;
		$post->description = $request->description;
		$post->save();
		// return response()->json($post);
		return 	redirect()->route('posts.allposts')->with('success', 'Post updated Successfully');
	}

	public function destroy($id)
	{
		$post = Post::find($id);
		if (!$post) {
			return response()->json(['message' => 'Post not found'], 404);
		}
		$post->delete();
		// return response()->json(['message' => 'Post deleted successfully']);
		return redirect()->route('posts.allposts')->with('success', 'Post deleted successfully.');
	}
}
