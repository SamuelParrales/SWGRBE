<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\rest\v1\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;

class ProfileRestController extends Controller
{
    public function update(UpdateProfileRequest $request)
    {
        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();
    }

    public function destroy(Request $request)
    {
        $id = Auth::User()->id;
        Auth::logout();
        User::findOrFail($id)->delete();
    }
}
