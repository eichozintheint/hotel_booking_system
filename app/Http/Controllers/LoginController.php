<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create(){
        return view('login');
    }


}
