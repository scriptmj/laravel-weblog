<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        DB::table('users')->insert([
            'username' => 'Liara T\'soni',
            'password' => Hash::make('liaratsoni'),
            'email' => '8b66da2473-f39a85@inbox.mailtrap.io',
            'digest' => true,
        ]);
        DB::table('users')->insert([
            'username' => 'Shepard',
            'password' => Hash::make('cmdrshepard'),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'username' => 'Piper Wright',
            'password' => Hash::make('piperwright'),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'username' => 'Wrex',
            'password' => Hash::make('urdnotwrex'),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'username' => 'Miranda',
            'password' => Hash::make('miranda1'),
            'email' => Str::random(10),
        ]);
    }
}
