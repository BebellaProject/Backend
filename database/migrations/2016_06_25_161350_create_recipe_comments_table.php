<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipeCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_comments', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('recipe_id')->nullable(false);
            $table->unsignedInteger('user_id')->nullable(false);
            
            $table->text('comment')->nullable(false);
            
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
        Schema::drop('recipe_comments');
    }
}
