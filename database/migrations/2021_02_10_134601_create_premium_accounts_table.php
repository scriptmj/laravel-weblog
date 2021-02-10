<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_accounts', function (Blueprint $table) {
            $table->id();
            //$table->integer('user_id');
            $table->timestamp('subscribed_at');
            $table->timestamp('last_payment')->nullable();
            $table->timestamp('next_payment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_accounts');
    }
}
