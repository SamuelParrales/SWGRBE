<?php

namespace App\Http\Controllers\mvc\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('user.profile.show',compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit',compact('user'));
    }
}
