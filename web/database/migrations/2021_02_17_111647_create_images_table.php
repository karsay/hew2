<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('images_id',8);
            $table->unsignedBigInteger('products_id')->length(10);
            $table->foreign('products_id')->references('products_id')->on('products');
            $table->string('images_path',255);
            $table->date('images_date')->format('YYYY/MM/DD')->nullable();
            $table->tinyInteger('images_is_deleted')->default(0)->nullable()->comment('削除フラグ,trueのとき削除');
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
        Schema::dropIfExists('images');
    }
}
