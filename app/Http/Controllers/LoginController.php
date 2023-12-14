<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;

class LoginController extends Controller
{
    public function createLoginForm(){
        return view('login');
    }

    public function customerLoggedin(){
        $email = request()->email;
        $password = request()->password;
        if(Auth::guard('customers')->attempt(['email'=>$email,'password'=>$password])){
            return redirect()->intended('/');
        }
        return redirect('/login')->with('error','Invalid email or password');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function adminLoginForm(){
        return view('adminLoginForm');
    }

    public function adminLoggedin(){
        $email = request()->email;
        $password = request()->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            return redirect()->intended('admin/dashboard');
        }
        return redirect('/admin/login')->with('error','Invalid email or password');
    }

    public function adminLogout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }


    // public function adminLogin(){
    //     $name = request()->
    // }


}
