<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('이름');
            $table->string('user_id')->unique()->comment('아이디'); // 아이디 추가
            $table->unsignedSmallInteger('user_level')->comment('권한'); // 유저레벨(권한) 추가
            $table->string('email')->unique()->comment('이메일');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('비밀번호');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
