<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecipeStepNewColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recipe_steps', function (Blueprint $table) {
            $table->enum('type', ['image', 'moment'])->default('image');
            $table->string('moment')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recipe_steps', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('moment');
        });
    }
}
