<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->text('comment')->nullable();
            $table->boolean('is_active')->default(false);
            $table->integer('review_type_id')->unsigned();
            $table->integer('robo_advisor_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);

            $table->foreign('review_type_id')->references('id')->on('review_types');
            $table->foreign('robo_advisor_id')->references('id')->on('robo_advisors')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('review');
    }
}
