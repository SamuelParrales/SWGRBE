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

    public function __construct()
    {
        $this->middleware(['auth','verified']);

    }

    public function update(UpdateProfileRequest $request)
    {


        $user = User::findOrFail($request->id);
        $email =strtolower($request->email);
        $oldEmail = $user->email;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $email;

        if($email!=$oldEmail) $user->email_verified_at = null;
        $user->save();

        if($email!=$oldEmail) $user->sendEmailVerificationNotification();

    }

    public function destroy(Request $request)
    {
        $id = Auth::User()->id;
        Auth::logout();
        User::findOrFail($id)->delete();
    }
}
