<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('contacts_id');
            $table->unsignedBigInteger('users_id')->length(8);
            $table->foreign('users_id')->references('users_id')->on('users');
            $table->string('contacts_type',20);
            $table->string('contacts_inquiry',1024);
            $table->date('contacts_date')->format('YYYY/MM/DD');
            $table->tinyInteger('contacts_is_supported')->default(0)->nullable()->comment('対応中フラグ,trueのとき対応中');
            $table->tinyInteger('contacts_is_replied')->default(0)->nullable()->comment('返答送信済みフラグ,trueのとき返答済み');
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
        Schema::dropIfExists('contacts');
    }
}
