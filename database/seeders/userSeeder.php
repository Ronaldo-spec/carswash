<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            'username' =>'admin',
            'name'=> 'gunawan',
            'email'=> 'api@admin.com',
            'role'=> 'admin',
            'password'=> Hash::make('password'),
        ]);
    }
}
