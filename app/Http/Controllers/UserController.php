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
         'name' => 'required',
         'email' => 'required|email',
         'password' => 'required'
      ]);

      $user = User::create($data);
      // $user = DB::table('users')->insert($data);
      if ($user) {
         return redirect()->route('login');
         //    return response()->json($user);
      }
   }

   /* ----------------------------------------------------------------------------- */
   public function login()
   {
      return view('user.login');
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
   /* ----------------------------------------------------------------------------- */
   //todo: Dashboard
   public function dashboard()
   {
      return  Auth::check() ? view('admin.index') : redirect()->route('login');
   }

   /* ----------------------------------------------------------------------------- */
   // Logout method
   public function logout(Request $request)
   {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect('login');
   }
}
