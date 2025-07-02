<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Hello Loco', // $greeting variable in home.blade.php
    ]);
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'title' => 'Programmer',
                'salary' => '$40,000'
            ],
            [
                'title' => 'Teacher',
                'salary' => '$20,000'
            ]
        ]
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
