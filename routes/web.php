<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HloginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\ModifyController;


Route::get('/', [FrontController::class, 'index']);

Route::get('/step1', [FrontController::class, 'step1']);

Route::get('/step2', [FrontController::class, 'step2']);

Route::get('/step3', [FrontController::class, 'step3'])->name('auth.step3');

Route::post('/step3', [SignUpController::class, 'validator']); //유효성검사

Route::get('/step4', [FrontController::class, 'step4']);

Route::post('/step4', [SignUpController::class, 'step4'])->name('auth.step4'); //Register

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/hlogin', [HloginController::class, 'hlogin']);

Route::post('/hlogin', [HloginController::class, 'ulogin'])->name('auth.hlogin');

Route::get('/logout', [FrontController::class, 'logout']);

Route::get('/findpw', [FrontController::class, 'fpw']);

Route::post('/findpw', [FindController::class, 'find'])->name('su.pw');

Route::get('/findid', [FrontController::class, 'fid']);

Route::post('/findid', [FindController::class, 'find'])->name('su.id');

Route::get('/successid', [FrontController::class, 'suid']);

Route::post('/successid', [FindController::class, 'suid'])->name('success');

Route::get('/successpw', [FrontController::class, 'supw']);

Route::post('/successpw', [FindController::class, 'supw'])->name('successpw');

Route::post('/', [ModifyController::class, 'modifypw'])->name('modipw');

Route::get('/mypro', [FrontController::class, 'profile'])->name('mypro');

Route::post('/mypro', [ModifyController::class, 'profile'])->name('myprofile');

Route::post('/mypro', function(){

    return redirect('profile')->with('status');
});

Route::post('/', [ModifyController::class, 'modipro'])->name('modi.pro');


Auth::routes();

