<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => "DiseñadorPro123",
            'email' => "micorreo@mail.com",
            'password' => Hash::make('asd12345'),
        ]);

        DB::table('users')->insert([
            'username' => "CuentaTest",
            'email' => "test@test.com",
            'password' => Hash::make('testtest'),
        ]);
    }
}