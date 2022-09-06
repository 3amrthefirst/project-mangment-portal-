<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function() {

//    return view('WelcomeMail.WelcomeEnglish');
    $pdf = \PDF::loadView('WelcomeMail.WelcomeEnglish');
    $pdf->setPaper('a4')->save(storage_path() . '/app/public/test.pdf');
});
