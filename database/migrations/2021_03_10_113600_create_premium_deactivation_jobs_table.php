<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremiumDeactivationJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premium_deactivation_jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('deactivation_date')->nullable();
        });

        Schema::table('premium_deactivation_jobs', function (Blueprint $table){
            $table->foreignId('premium_id')
                ->constrained('premium_accounts')
                ->onDelete('cascade');
        });

        Schema::table('premium_accounts', function (Blueprint $table){
            $table->foreign('deactivation_job')
                ->references('id')->on('premium_deactivation_jobs')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premium_deactivation_jobs');
    }
}
