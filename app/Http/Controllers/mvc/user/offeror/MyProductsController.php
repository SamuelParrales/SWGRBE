<?php

namespace App\Http\Controllers\mvc\user\offeror;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyProductsController extends Controller
{
    public function index()
    {
        return view('user.offeror.myProducts');
    }
}
