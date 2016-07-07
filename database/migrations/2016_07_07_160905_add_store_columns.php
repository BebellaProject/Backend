<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStoreColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string('short_desc')->nullable(true);
            $table->text('desc')->nullable(true);
            $table->string('website')->nullable(true);
            $table->string('facebook_page')->nullable(true);
            $table->string('image_path')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('short_desc');
            $table->dropColumn('desc');
            $table->dropColumn('website');
            $table->dropColumn('facebook_page');
            $table->dropColumn('image_path');
        });
    }
}
