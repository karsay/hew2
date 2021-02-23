<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->bigIncrements('follows_id',10);
            $table->unsignedBigInteger('follows_to_user')->length(8);
            $table->unsignedBigInteger('follows_from_user')->length(8);
            $table->foreign('follows_to_user')->references('users_id')->on('users');
            $table->foreign('follows_from_user')->references('users_id')->on('users');
            $table->date('follows_date')->nullable();
            $table->tinyInteger('follows_is_deleted')->default(0)->nullable()->comment('削除フラグ ,trueのとき削除');
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
        Schema::dropIfExists('follows');
    }
}
