<?php

namespace Database\Seeders\testdata;

use App\Models\Moderator;
use App\Models\Offeror;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Offeror01";
        $user->last_name = "Prueba";
        $user->username = "Offeror01Prueba";
        $user->email ="offeror@email.com";
        $user->password = Hash::make("123456");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->profile_type = Offeror::class;
        $user->save();

        $offeror = new Offeror();
        $offeror->user_id = $user->id;

        $offeror->save();


        $user = new User();
        $user->name = "Offeror02";
        $user->last_name = "Prueba";
        $user->username = "Offeror02Prueba";
        $user->email ="offeror2@email.com";
        $user->password = Hash::make("123456");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->profile_type = Offeror::class;
        $user->save();

        $offeror = new Offeror();
        $offeror->user_id = $user->id;

        $offeror->save();


        // Moderators
        $user = new User();
        $user->name = "Moderator01";
        $user->last_name = "Prueba";
        $user->username = "Moderator01Prueb";
        $user->email ="moderator@email.com";
        $user->password = Hash::make("123456");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->profile_type = Moderator::class;
        $user->save();

        $offeror = new Moderator();
        $offeror->user_id = $user->id;

        $offeror->save();
    }
}
