<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Offeror;
use App\Models\Admin;


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

        $user->name = "Admin";
        $user->last_name = "M";
        $user->username = "AdminPrueba";
        $user->email ="soporte.swgrbe@gmail.com";
        $user->password = Hash::make("123456");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->profile_type = Admin::class;
        $user->save();

        $admin = new Admin();
        $admin->user_id = $user->id;
        $admin->save();





    }
}
