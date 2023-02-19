<?php

namespace App\Http\Controllers\rest\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\rest\v1\ModeratorRequest;
use App\Models\Moderator;
use App\Models\User;
use App\Notifications\SendPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModeratorRestController extends Controller
{
    public function store(ModeratorRequest $request)
    {
        $this->middleware(['auth', 'verified', 'profile:Admin']);
        $password= Str::random(8);
        $user = User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($password),
            'profile_type' => Moderator::class,
        ]);

        $moderator = new Moderator();
        $moderator->user_id = $user->id;
        $moderator->save();

        $user->notify(new SendPassword($password));
        $user->sendEmailVerificationNotification();
        return $user;
    }
    public function destroy($id)
    {
        $this->middleware(['auth', 'verified', 'profile:Admin']);
        $moderator = Moderator::find($id)->user;
        return $moderator->forceDelete();
    }
}
