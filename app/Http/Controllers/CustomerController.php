<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function store(){
        // $request->validate([
        //     'name'=>'required'|'max:30',
        //     'username'=>'required'|'unique',
        //     'email'=>'required'|'email',
        //     'password'=>'required'|'min:8'|'max:20'
        // ]);

        $customer = new Customer();
        $customer->name=request()->name;
        $customer->username=request()->username;
        $customer->email=request()->email;
        $customer->password=request()->password;
        $customer->save();

        $ref=request()->ref;
        if($ref === 'register'){
            return redirect('login')->with('success','Data has been saved');
        }

    }

    public function customerLogin(){
        $email = request()->email;
        $password = request()->password;
        $checkUser = Customer::where(['email'=>$email,'password'=>$password])->count();
        if($checkUser > 0){
            $checkUser = Customer::where(['email'=>$email,'password'=>$password])->get();
            session(['customerLogin'=>true,'data'=>$checkUser]);
            return redirect('/');
        }
        else{
            return redirect('/login')->with('error','Invalid email or password!');
        }
    }

    public function logout(){
        session()->forget(['customerLogin','data']);
        return redirect('/login');
    }
}
