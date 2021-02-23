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
            $table->integer('details_state')->comment('0: 1: 2: 3: 4: 5:');
            $table->integer('details_shipping_fee')->comment('0: 1: 2: 3: 4: 5:');
            $table->date('shipping_date')->format('DD')->nullable();
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
