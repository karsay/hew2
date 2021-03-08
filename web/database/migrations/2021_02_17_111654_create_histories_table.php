<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->unsignedBigInteger('products_id')->length(10);
            $table->unsignedBigInteger('users_id')->length(8);
            $table->foreign('users_id')->references('users_id')->on('users');//長さの書き方違いの可能性あり
            $table->date('histories_date')->format('YYYY/MM/DD');
            $table->boolean('histories_is_paid')->default(false)->nullable()->comment('支払い済みフラグ,支払い済みならtrue');
            $table->string('histories_delivery_fee')->default(0)->nullable()->comment('商品の配送料,配送料が購入者負担のみ入れる。出品者負担なら0');
            $table->string('histories_shipping_state')->default(0)->nullable()->comment('商品の配達状況,0未払い　1未発送　2発送済み　3配達済み');
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
        Schema::dropIfExists('histories');
    }
}
