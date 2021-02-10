<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyConstraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->foreignId('premium_account_id')->constrained();
        });
        Schema::table('posts', function (Blueprint $table){
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('premium_accounts', function (Blueprint $table){
            $table->foreignId('user_id')->constrained();
        });
        Schema::table('comments', function (Blueprint $table){
            $table->foreignId('user_id')->constrained();
            $table->foreignId('posts_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign('premium_account_id');
        });
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeign('user_id');
        });
        Schema::table('premium_accounts', function (Blueprint $table){
            $table->dropForeign('user_id');
        });
        Schema::table('comments', function (Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('posts_id');
        });
    }
}
