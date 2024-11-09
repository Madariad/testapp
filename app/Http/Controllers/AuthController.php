<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage() {
        return view('auth.login');
    }

    public function registerPage() {
        return view('auth.register');
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        // dd($data);

        $conditional = Teacher::where('email', $request->input('email'))->first();


      
        if ($conditional) {
            if (Auth::guard('teachers')->attempt($data)) {
                $request->session()->regenerate();
           
                return redirect()->route('mainPage');
            }

             return redirect()->back()->withErrors(['email' => 'Invalid email or password'])->withInput();

        }

        if (Auth::guard('web')->attempt($data)) {
            $request->session()->regenerate();
  

            return redirect()->route('mainPageUser');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function register(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email|unique:teachers,email',
            'password' => 'required|min:8'
        ]);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('mainPageUser');

        
    }
    public function logout(Request $request) 
    {
        Auth::guard('web')->logout();
        
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('loginPage');
    }

    public function logoutTeachere(Request $request){
        Auth::guard('teachers')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('loginPage');
    }
    
    
}
