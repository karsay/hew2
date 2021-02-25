<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->unsignedBigInteger('products_id')->length(10);
            $table->string('details_title',50);
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('categories_id')->on('categories');
            $table->string('details_description',250)->nullable();
            $table->integer('details_price')->length(8);
            $table->integer('details_state')->comment('0:新品未使用 　1:未使用に近い 　2:目立つ傷、汚れ無し 　3:やや傷あり、汚れあり 　4:傷あり ');
            $table->integer('details_shipping_fee')->comment('0:出品者負担　 1:購入者負担');
            $table->integer('details_area')->comment('0:北海道 1:東北 2:関東 3:中部 4:近畿 5:中国 6:四国 7:九州 8:その他');
            $table->integer('shipping_date')->comment('0:当日 1:１〜３日 2:３〜５日 3:５日以上');
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
        Schema::dropIfExists('details');
    }
}
