<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNewsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('news_id')->constrained('news');
            $table->text('body')->comment('Тело коммента');
            $table->unsignedInteger('useful')->default(0);
            $table->unsignedInteger('unuseful')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP
                ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('comments');
    }
}
