<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   /* ----------------------------------------------------------------------------- */
   public function registerSave(Request $request)
   {
      $data = $request->validate([
         'name' => 'required|string|max:255',
         'email' => 'required|string|email|max:255|unique:users',
         'password' => 'required|string|min:8|confirmed',
      ]);

      $user = User::create($data);
      // $user = DB::table('users')->insert($data);
      if ($user) {
         return redirect()->route('login');
         //    return response()->json($user);
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
         $view = Auth::user()->role === 'admin' ? 'admin.index' : 'user.index';
         return view($view);
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
}
