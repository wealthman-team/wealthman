<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLinkFromRoboAdvisorsToBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('robo_advisors', function (Blueprint $table) {
            $table->integer('post_id')->after('is_active')->unsigned()->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('robo_advisors')) {
            Schema::table('robo_advisors', function (Blueprint $table) {
                $table->dropColumn('post_id');
            });
        }
    }
}
