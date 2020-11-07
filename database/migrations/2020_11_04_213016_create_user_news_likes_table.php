<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNewsLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_likes_news', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('news_id')->constrained('news');
            $table->enum('like', ['yes', 'no', 'notappreciate'])
                ->default('notappreciate');
            $table->boolean('favorite')->unsigned()->nullable();
            $table->primary(['user_id', 'news_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_likes_news');
    }
}
