<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'username' => 'Liara T\'soni',
            'password' => Str::random(8),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'username' => 'Shepard',
            'password' => Str::random(8),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'username' => 'Piper Wright',
            'password' => Str::random(8),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'username' => 'Wrex',
            'password' => Str::random(8),
            'email' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'username' => 'Miranda',
            'password' => Str::random(8),
            'email' => Str::random(10),
        ]);
    }
}
