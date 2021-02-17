<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Overly sick concept.',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'My 36 year old children rates this icons very fab!',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Splendid!! I admire the use of navigation and typography!',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'It\'s beastly not just amazing!',

            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Nice use of red in this concept :)',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Let me take a nap... great shot, anyway.',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Yes yes yes yes yes yes.',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Pink. Can\'t wait to try it out.',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Exquisite work you have here.',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Ahhhhhhh...',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Overly fab, friend.',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'Good. So sublime.',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'This is fresh work!!',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
        DB::table('comments')->insert([
            'posted_at' => Carbon::now(),
            'body' => 'I love your shot m8',
            'user_id' => rand(1, 5),
            'post_id' => rand(1, 7),
        ]);
    }
}
