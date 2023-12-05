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
        $checkUser = Customer::where(['email'=>$email,'password'=>$password])->count();
        if($checkUser > 0){
            $getUserData = Customer::where(['email'=>$email,'password'=>$password])->select('id')->first();
            $customerID = $getUserData->id;
            session()->put('customerID',$customerID);
            // Session::has(['customerLogin'=>true,'data'=>$getUserData]);
            return redirect()->intended('/');
        }
        else{
            return redirect('/login')->with('error','Invalid email or password!');
        }


    }



    public function logout(){
        session()->forget(['customerLogin','data']);
        return redirect('/');
    }


}
