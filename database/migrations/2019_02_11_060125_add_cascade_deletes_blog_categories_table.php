<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeDeletesBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_posts_categories', function (Blueprint $table) {
            $table->dropPrimary(['post_id', 'category_id']);
        });
        Schema::table('blog_posts_categories', function (Blueprint $table) {
            $table->increments('id')->first();
            $table->foreign('post_id')->references('id')->on('blog_posts')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('blog_posts_categories')) {
            Schema::table('blog_posts_categories', function (Blueprint $table) {
                $table->dropPrimary('id');
                $table->dropColumn('id');
                $table->dropForeign('post_id');
                $table->dropForeign('category_id');
            });
            Schema::table('blog_posts_categories', function (Blueprint $table) {
                $table->dropPrimary('id');
                $table->dropColumn('id');
                $table->dropForeign('post_id');
                $table->dropForeign('category_id');
            });
        }
    }
}
