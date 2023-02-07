<?php

namespace App\Http\Controllers\mvc\user\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function productIndex(){
        return view('user.admin.product.index');
    }

    public function userIndex(){
        return view('user.admin.user.index');
    }


    public function reportIndex(){
        return view('user.admin.report.index');
    }
}
