<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) { //users란 테이블을 생성
            $table->id();

            $table->string('name')->comment('이름');

            $table->string('user_id')->unique()->comment('아이디'); // 아이디 추가

            $table->string('email')->unique()->comment('이메일');

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password')->comment('비밀번호');

            $table->rememberToken();

            $table->string('phone')->unique()->comment('휴대폰');

            $table->string('tel')->comment('집전화');

            $table->string('addr1')->comment('우편번호');

            $table->string('addr2')->comment('기본주소');

            $table->string('addr3')->comment('상세주소');

            $table->boolean('smsre')->default('1')->comment('sms수신');

            $table->boolean('emare')->default('1')->comment('메일수신');

            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
