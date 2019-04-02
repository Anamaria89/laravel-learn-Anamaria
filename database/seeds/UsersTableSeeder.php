<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'role' => User::ADMINISTRATOR,
            'name' => "Aleksandar Stanojevic",
           'email' => "aleksandar.stanojevic@cubes.rs",
           'address' => '',
           'phone' => '',
           'password' => Hash::make('cubes'),
           'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        DB::table('users')->insert([
            'role' => User::ADMINISTRATOR,
            'name' => "Anamaria Dragic",
            'email' => "amic_dragic@yahoo.com",
            'address' => '',
            'phone' => '',
            'password' => Hash::make('anamaria'),
            'active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
