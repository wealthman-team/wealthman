<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCascadeDeletesBlogTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_posts_tags', function (Blueprint $table) {
            $table->dropPrimary(['post_id', 'tag_id']);
        });
        Schema::table('blog_posts_tags', function (Blueprint $table) {
            $table->increments('id')->first();;
            $table->foreign('post_id')->references('id')->on('blog_posts')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('blog_tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('blog_posts_tags')) {
            Schema::table('blog_posts_tags', function (Blueprint $table) {
                $table->dropPrimary('id');
                $table->dropColumn('id');
                $table->dropForeign('post_id');
                $table->dropForeign('tag_id');
            });
            Schema::table('blog_posts_tags', function (Blueprint $table) {
                $table->primary(['post_id', 'tag_id']);
            });
        }
    }
}
