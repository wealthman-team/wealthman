<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTypeRoboAdvisorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_type_robo_advisor', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('account_type_id')->index();
            $table->foreign('account_type_id')->references('id')->on('account_types')->onDelete('cascade');

            $table->unsignedInteger('robo_advisor_id')->index();
            $table->foreign('robo_advisor_id')->references('id')->on('robo_advisors')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_type_robo_advisor');
    }
}
