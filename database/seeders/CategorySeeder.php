<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'unfortunate'
        ]);
        DB::table('categories')->insert([
            'name' => 'astonishing'
        ]);  
        DB::table('categories')->insert([
            'name' => 'crack'
        ]);  
        DB::table('categories')->insert([
            'name' => 'goat'
        ]);    
        DB::table('categories')->insert([
            'name' => 'shell'
        ]);
        DB::table('categories')->insert([
            'name' => 'architect'
        ]);
        DB::table('categories')->insert([
            'name' => 'predict'
        ]);  
        DB::table('categories')->insert([
            'name' => 'problem'
        ]);  
        DB::table('categories')->insert([
            'name' => 'halt'
        ]);    
        DB::table('categories')->insert([
            'name' => 'build'
        ]);
        DB::table('categories')->insert([
            'name' => 'Norway'
        ]);
    }
}
