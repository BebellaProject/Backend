<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisualizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visualizations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('product_option_id')->nullable(false);
            $table->unsignedInteger('recipe_id')->nullable(false);
            $table->unsignedInteger('user_id')->nullable(false);
            
            $table->boolean('active')->default(true);
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
        Schema::drop('visualizations');
    }
}
