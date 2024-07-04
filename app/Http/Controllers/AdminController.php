<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_registerSave(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $admin = User::create($data);
        if($admin){
            return redirect()->route('admin_login');
        }
    }

    public function admin_loginSave(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            return redirect()->route('admin_dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
         ])->withInput();
    }

    public function admin_dashboard()
    {
        if (Auth::check()) {
            $view = Auth::user()->role === 'admin' ? 'admin.home' : 'user.home';
            return view($view);
         }  

        return redirect()->route('/admin/login');
    }

    public function admin_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
  
        return redirect('/admin/login');
    }
}