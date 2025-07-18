<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index(){
        $jobs = Job::with('employer')->latest()->paginate(5);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create(){
        return view('jobs.create');
    }

    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }

    public function store(){
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
    }

    public function edit(Job $job){
        //Gate::authorize('edit-job', $job);

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job){
        Gate::authorize('edit-job', $job);
        // Validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric', 'min:0']
        ]);

        // Authorize and update
        //$job = Job::findOrFail($id);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 // Assuming the employer is always 1 for simplicity
        ]);

        // Redirect to the job page
        return redirect('/jobs/'. $job->id);
    }

    public function destroy(Job $job){
        Gate::authorize('edit-job', $job);
        $job->delete();

        return redirect('/jobs');
    }
}
