<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {

    return view('home', [
        'greeting' => 'Hello Loco'
    ]);
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(5);
    //$jobs = Job::with('employer')->cursorPaginate(5); // Genera las queries al hacer hover sobre los links de paginación
    //$jobs = Job::with('employer')->simplePaginate(5); // Sólo genera dos botones, prevous y next, sin números de página

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create
Route::get('/jobs/create', function (){
    return view('jobs.create');
});

//Show
Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

//Store
Route::post('/jobs', function (){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'numeric', 'min:0']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id){
    $job = Job::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id){
    // Validate
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'numeric', 'min:0']
    ]);

    // Authorize and update
    $job = Job::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1 // Assuming the employer is always 1 for simplicity
    ]);

    // Redirect to the job page
    return redirect('/jobs/'. $job->id);

});

// Destroy
Route::delete('/jobs/{id}', function ($id){
    Job::findOrFail($id)->delete();

    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
