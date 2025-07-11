<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {

    return view('home', [
        'greeting' => 'Hello Loco'
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(5);
    //$jobs = Job::with('employer')->cursorPaginate(5); // Genera las queries al hacer hover sobre los links de paginación
    //$jobs = Job::with('employer')->simplePaginate(5); // Sólo genera dos botones, prevous y next, sin números de página

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id){

    $job = Job::find($id);

    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
