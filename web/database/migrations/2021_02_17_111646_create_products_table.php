<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('products_id',10);
            $table->unsignedBigInteger('users_id')->length(8);
            $table->foreign('users_id')->references('users_id')->on('users');
            $table->date('products_date')->format('YYYY/MM/DD');
            $table->tinyInteger('products_is_selled')->default(0)->nullable()->comment('販売中フラグ,trueのとき売り切れ');
            $table->tinyInteger('products_is_deleted')->default(0)->nullable()->comment('削除フラグ,trueのとき削除');
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
        Schema::dropIfExists('products');
    }
}
