<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoboAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robo_advisors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('about_company')->nullable();
            $table->text('pros')->nullable();
            $table->text('cons')->nullable();
            $table->text('how_it_works')->nullable();
            $table->text('portfolio')->nullable();
            $table->text('conclusion')->nullable();
            $table->string('referral_link')->nullable();
            $table->string('video_link')->nullable();
            $table->integer('minimum_account')->nullable();
            $table->float('management_fee')->nullable();
            $table->string('fee_details')->nullable();
            $table->bigInteger('aum')->nullable();
            $table->string('promotions')->nullable();
            $table->boolean('human_advisors')->default(false);
            $table->string('human_advisors_details')->nullable();
            $table->boolean('assistance_401k')->default(false);
            $table->boolean('tax_loss')->default(false);
            $table->string('tax_loss_details')->nullable();
            $table->boolean('portfolio_rebalancing')->default(false);
            $table->boolean('retirement_planning')->default(false);
            $table->boolean('automatic_deposits')->default(false);
            $table->string('clearing_agency')->nullable();
            $table->boolean('self_clearing')->default(false);
            $table->boolean('smart_beta')->default(false);
            $table->boolean('responsible_investing')->default(false);
            $table->boolean('invests_commodities')->default(false);
            $table->boolean('real_estate')->default(false);
            $table->boolean('fractional_shares')->default(false);
            $table->string('access_platforms')->nullable();
            $table->boolean('two_factor_auth')->default(false);
            $table->string('customer_service')->nullable();
            $table->integer('number_accounts')->nullable();
            $table->integer('average_account_size')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('summary')->nullable();
            $table->boolean('is_verify')->default(false);
            $table->string('service_region')->nullable();
            $table->string('headquarters')->nullable();
            $table->string('founded')->nullable();
            $table->string('site_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('ceo')->nullable();
            $table->string('contact_details')->nullable();
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('robo_advisors');
    }
}
