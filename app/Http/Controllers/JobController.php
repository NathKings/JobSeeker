<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\JobsRepository;
use App\Job;

class JobController extends Controller
{
 	public function all()
    {
        $jobs = Job::all();
        return response()->json($jobs);
    }

    public function store(Request $request)
    {
    	dd($request->all());
         $request->validate([
            'priority' 		=> 'required',
            'description' 	=> 'required',
            'name' 			=> 'required'
        ]);

        $job = Job::create($request->all());

        return response()->json([
            'message' => 'El trabajo ha sido creado exitosamente!',
            'job_id' => $job->id
        ]);
    }

    public function show(Job $job)
    {
        return $job;
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'priority' 		=> 'nullable',
            'description' 	=> 'nullable',
            'name' 			=> 'nullable'
        ]);

        $job->update($request->all());

        return response()->json([
            'message' => 'El trabajo ha sido actualizado con éxito!',
            'job' => $job
        ]);
    }
}
