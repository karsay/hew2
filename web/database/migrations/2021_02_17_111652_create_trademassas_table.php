<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrademassasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trademassas', function (Blueprint $table) {
            $table->bigIncrements('trademassas_id',10);
            $table->unsignedBigInteger('products_id')->length(10);
            $table->unsignedBigInteger('users_id')->length(8);
            $table->foreign('products_id')->references('products_id')->on('products');
            $table->foreign('users_id')->references('users_id')->on('users');
            $table->string('trademassas_message')->length(255);
            $table->tinyInteger('trademassas_is_deleted')->default(0)->nullable()->comment('削除フラグ ,trueのとき削除');
            $table->tinyInteger('trademassas_either')->length(1)->default(0)->nullable()->comment('どちらの発言かを判別用,0が購入者、1が出品者');
            $table->date('trademassas_date')->format('YYYY/MM/DD')->nullable();
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
        Schema::dropIfExists('trademassas');
    }
}
