<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->bigIncrements('credits_id',8);
            $table->unsignedBigInteger('users_id')->length(8);
            $table->foreign('users_id')->references('users_id')->on('users');
            $table->string('credits_num',12);
            $table->string('credits_name',64);
            $table->date('credits_date')->format('MM/YY');
            $table->string('credits_sec_code',3);
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
        Schema::dropIfExists('credits');
    }
}
