<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            
            $table->enum('type', ['beauty', 'decoration', 'clothing'])->nullable(false);
            
            $table->unsignedInteger('channel_id')->nullable(false);
            
            $table->string('name')->nullable(false);
            $table->string('desc')->nullable(false);
            
            $table->string('image_path')->nullable(true);
            
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
        Schema::drop('recipes');
    }
}
