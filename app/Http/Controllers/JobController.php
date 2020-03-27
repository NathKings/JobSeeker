<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Processor;

class JobController extends Controller
{
    // This function return only the jobs with state pending, and
    // 'high' priority.
 	  public function all()
    {
        $jobs = Job::where('state' , '0')->where('priority', 'high')->get();
        return response()->json($jobs);
    }

    public function store(Request $request)
    {
         $request->validate([
            'priority' 		=> 'required',
            'description' 	=> 'required',
            'name' 			=> 'required',
            'state' => 'required',
            'processor_id' => 'required'
        ]);

        $job = Job::create($request->all());
        return response()->json([
            'message' => 'Job has been created successfully! Job ID: '.$job->id
        ]);
    }

    public function show(Job $job)
    {
        return $job;
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'priority' 		  => 'nullable',
            'description' 	=> 'nullable',
            'name' 			    => 'nullable',
            'status'       => 'nullable'
        ]);

        $job->update($request->all());

        return response()->json([
            'message' => 'Job has been updated successfully!',
            'job' => $job
        ]);
    }

    public function allProcessors()
    {
        $processors = Processor::all();
        return response()->json($processors);
    }

    // this function find a job by id
    // submitter can search a job by and id.
    public function findJobById($id)
    {
        return  Job::find($id);
    }
}
