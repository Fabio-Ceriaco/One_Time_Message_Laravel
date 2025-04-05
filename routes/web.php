<?php

use App\Http\Controllers\Main;
use Illuminate\Support\Facades\Route;

// show message form

Route::get('/', [Main::class, 'index'])->name('index');
Route::post('/init', [Main::class, 'init'])->name('init');

// confrimation message sent
Route::get('/confirm/{purl}', [Main::class, 'confirm'])->name('confirm');

// read message
Route::get('/read/{purl}', [Main::class, 'read'])->name('read');




/*
    1. sender create a message
    2. is send an confirmation email to the sender with purl
    3. a) the sender clicks on the link in email and return to aplication confirmation page
    3. b) the receiver reseves an email with a purl to read the message
    4. the receiver clicks on the link in email and is redirected to aplication where see the message
    (system sends an email to the sender with message read confrimation)
*/
