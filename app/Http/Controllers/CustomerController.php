<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $customer->username=request()->username;
        $customer->email=request()->email;
        $customer->password=request()->password;
        $customer->save();

        $ref=request()->ref;
        if($ref === 'register'){
            return redirect('/')->with('success','Data has been saved');
        }

    }


}
