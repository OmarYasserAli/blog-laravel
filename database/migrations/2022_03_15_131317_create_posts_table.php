<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('description');
            $table->integer('photo_id')->unsigned()->nullable()->change();;
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::create('likes', function (Blueprint $table) {
        $table->integer('user_id')->unsigned()->index();
        //$table->foreign('user_id')->references('id')->on('kids')->onDelete('cascade');
        $table->integer('post_id')->unsigned()->index();
        //$table->foreign('post_id')->references('id')->on('users')->onDelete('cascade');
        $table->primary(['user_id', 'post_id']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
