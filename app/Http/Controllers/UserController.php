<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   /* ----------------------------------------------------------------------------- */
   public function registerSave(Request $request)
   {
      $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:8|confirmed',
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->role = 'user';

      $user->save();
      if ($user) {
         return redirect()->route('login');
      }
   }

   /* ----------------------------------------------------------------------------- */
   public function loginSave(Request $request)
   {
      $credential = $request->validate([
         'email' => 'required|email',
         'password' => 'required'
      ]);

      $check = Auth::attempt($credential);

      if (Auth::attempt($credential)) {
         return redirect()->route('dashboard');
      }
      // Authentication failed...
      return back()->withErrors([
         'email' => 'The provided credentials do not match our records.',
      ])->withInput();
   }

   /* todo: Dashbord ---------------------------------------------------------------- */
   public function dashboard()
   {
      if (Auth::check()) {
         $view = Auth::user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard';
         $products = Product::all();
         return view($view, ['products' => $products]);
      }
      return redirect()->route('login');
   }

   /* Logout method ----------------------------------------------------------------- */
   public function logout(Request $request)
   {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('login');
   }
   /* ----------------------------------------------------------------------------- */
   public function homeContent()
   {
      $products = Product::with('category')->get();
      $categories = Category::all();
      return view('user.home', compact('products','categories'));
   }

   public function category_by_id($id){
      $products = DB::table('products')->where('category_id', $id)->get();
      $categories = Category::all();
      return view('user.category_product', compact('products','categories'));
  }
}
