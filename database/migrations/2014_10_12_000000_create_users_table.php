<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('social_id')->nullable();// tai khoan mang xh
            $table->string('avatar')->nullable();
            $table->integer('ruler')->default(0);//Phan quyen 0 la kh,1,2,3... quyen admin dung midderwale
            $table->integer('status')->default(0);// trang thai 0:chua kich hoat,gui mail tao ma kich hoat
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
