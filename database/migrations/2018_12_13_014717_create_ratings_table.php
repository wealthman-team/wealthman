<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->float('commissions')->default(0);
            $table->float('service')->default(0);
            $table->float('comfortable')->default(0);
            $table->float('tools')->default(0);
            $table->float('investment_options')->default(0);
            $table->float('asset_allocation')->default(0);
            $table->float('total')->default(0);

            $table->integer('robo_advisor_id')->unsigned()->unique();
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
        Schema::dropIfExists('ratings');
    }
}
