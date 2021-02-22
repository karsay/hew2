<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('comments_id',10);
            $table->unsignedBigInteger('products_id')->length(10);
            $table->unsignedBigInteger('users_id')->length(8);
            $table->foreign('products_id')->references('products_id')->on('products');
            $table->foreign('users_id')->references('users_id')->on('users');
            $table->string('comments_message')->length(255);
            $table->tinyInteger('comments_is_deleted')->default(0)->nullable()->comment('削除フラグ,trueのとき削除');
            $table->date('comments_date')->format('YYYY/MM/DD')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
