<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('user_id')->nullable(false);
            
            $table->string('name')->nullable(false);
            $table->string('short_desc')->nullable(true);
            $table->text('desc')->nullable(true);
            
            $table->string('image_path')->nullable(true);
            
            $table->string('youtube_user')->nullable(true);
            $table->string('facebook_page')->nullable(true);
            $table->string('website')->nullable(true);
            
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
        Schema::drop('channels');
    }
}
