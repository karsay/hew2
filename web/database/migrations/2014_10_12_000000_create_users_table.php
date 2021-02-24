<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('users_id',8);
            $table->string('users_name',64);
            $table->string('users_email',128)->unique()->nullable();
            $table->string('users_gender',1)->nullable();
            $table->date('users_birthday')->format('YYYY/MM/DD')->nullable();
            $table->string('users_postal_code',7)->nullable();
            $table->string('users_state',12)->nullable();
            $table->string('users_city',128)->nullable();
            $table->string('users_suburb',128)->nullable();
            $table->string('users_images_path',255)->nullable();
            $table->string('users_profile',255)->nullable();
            $table->date('users_signup_date')->format('MM/DD')->nullable();
            $table->tinyInteger('users_is_deleted')->default(0)->nullable()->comment('削除フラグ,trueで削除');
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
        Schema::dropIfExists('users');
    }
}