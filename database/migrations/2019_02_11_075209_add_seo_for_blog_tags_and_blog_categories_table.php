<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeoForBlogTagsAndBlogCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_tags', function (Blueprint $table) {
            $table->string('seo_keywords')->nullable()->after('slug');
            $table->string('seo_description')->nullable()->after('slug');
            $table->string('seo_title')->nullable()->after('slug');
            $table->longText('description')->nullable()->after('slug');
        });
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->string('seo_keywords')->nullable()->after('slug');
            $table->string('seo_description')->nullable()->after('slug');
            $table->string('seo_title')->nullable()->after('slug');
            $table->longText('description')->nullable()->after('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('blog_tags')) {
            Schema::table('blog_tags', function (Blueprint $table) {
                $table->dropColumn('seo_title');
                $table->dropColumn('seo_description');
                $table->dropColumn('seo_keywords');
                $table->dropColumn('description');
            });
        }
        if (Schema::hasTable('blog_categories')) {
            Schema::table('blog_categories', function (Blueprint $table) {
                $table->dropColumn('seo_title');
                $table->dropColumn('seo_description');
                $table->dropColumn('seo_keywords');
                $table->dropColumn('description');
            });
        }
    }
}
