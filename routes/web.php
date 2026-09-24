<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', ['x' => random_int(1, 10)]);
});

Route::get('/contact', function () {
    return view('contact', [
        'data' => [
            'name' => 'Reza Mulia Putra',
            'class' => 'PSIK25B',
            'nim' => 4251250010,
            'discord' => 'realitaa'
        ]
    ]);
});
