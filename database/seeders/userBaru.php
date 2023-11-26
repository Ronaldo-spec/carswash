<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userBaru extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table("users")->insert([
        'username' =>'adminbaru',
        'name'=> 'admin baru',
        'email'=> 'baru@admin.com',
        'role'=> 'admin',
        'password'=> Hash::make('password'),
       ]);
    }
}
