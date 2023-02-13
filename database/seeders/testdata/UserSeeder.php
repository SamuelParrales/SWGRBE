<?php

namespace Database\Seeders\testdata;

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
        // $offeror->banned = false;
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
        // $offeror->banned = false;
        $offeror->save();
    }
}
