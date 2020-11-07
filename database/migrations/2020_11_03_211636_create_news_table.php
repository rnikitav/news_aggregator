<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCategory')
                ->nullable(false);
            $table->foreign('idCategory')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade');
            $table->foreignId('source_id')
                ->constrained('source_news')
                ->onUpdate('cascade');
            $table->string('slug', 255);
            $table->string('title', 255)
                ->nullable(false);
            $table->string('desc')
                ->comment('Короткое описание Новости');
            $table->unsignedBigInteger('views')
                ->default(0);
            $table->unsignedbigInteger('likes')
                ->default(0);
            $table->unsignedbigInteger('dislikes')
                ->default(0);
            $table->string('img', 255);
            $table->text('body')
                ->comment('Тело Новости HTML');
            $table->boolean('is_private')
                ->default(true)
                ->comment('Доступна ли новость для
                неавторизованных пользователей');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
