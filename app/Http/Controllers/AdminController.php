<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_registerSave(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = $request->password;
        $admin->role = 'admin';

        $admin->save();

        return redirect()->route('admin_login');
        
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
            $view = Auth::user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard';
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