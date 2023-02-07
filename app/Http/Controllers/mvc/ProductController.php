<?php

namespace App\Http\Controllers\mvc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("product.index");

    }

    public function show()
    {
        return view('product.show');
    }
    public function create()
    {
        return view('product.create');
    }
}
