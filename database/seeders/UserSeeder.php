<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role =  new Role();
        $role->name = "Admin";
        $role->save();

        $role =  new Role();
        $role->name = "Offeror";
        $role->save();

        $user = new User();
        $user->role_id = 1;
        $user->name = "Admin";
        $user->last_name = "Prueba";
        $user->username = "AdminPrueba";
        $user->email ="admin@email.com";
        $user->password = Hash::make("123456");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();

        $user = new User();
        $user->role_id = 2;
        $user->name = "Offeror";
        $user->last_name = "Prueba";
        $user->username = "OfferorPrueba";
        $user->email ="offeror@email.com";
        $user->password = Hash::make("123456");
        $user->email_verified_at = date("Y-m-d H:i:s");
        $user->save();

    }
}
