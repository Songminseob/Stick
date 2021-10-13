<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //User::Create 사용시 필요
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id',
        'phone',
        'tel',
        'addr1',
        'addr2',
        'addr3',
        'smsre',
        'emare'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $timestamp = [
        'created_at', 'updated_at'
    ];

}
