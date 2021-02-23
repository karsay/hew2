<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('products_id')->length(10);
            $table->unsignedBigInteger('users_id')->length(8);
            $table->date('likes_date')->format('YYYY/MM/DD')->nullable();
            $table->tinyInteger('likes_is_deleted')->default(0)->nullable()->comment('削除フラグ,trueのとき削除');
            $table->timestamps();

            $table->foreign('products_id')->references('products_id')->on('products');
            $table->foreign('users_id')->references('users_id')->on('users');

            $table->unique(['products_id', 'users_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
