<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductOptionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_options', function (Blueprint $table) {
            $table->string('name')->nullable(true);
            $table->string('image_path')->nullable(true);
            $table->text('desc')->nullable(true);
            $table->double('price')->nullable(false);
            $table->string('store_url')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_options', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('image_path');
            $table->dropColumn('desc');
            $table->dropColumn('price');
            $table->dropColumn('store_url');
        });
    }
}
