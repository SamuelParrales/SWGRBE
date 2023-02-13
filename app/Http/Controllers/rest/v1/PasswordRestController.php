<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\rest\v1\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordRestController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    public function update(UpdatePasswordRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->password = hash::make($request->new_password);

        $user->save();
    }
}
