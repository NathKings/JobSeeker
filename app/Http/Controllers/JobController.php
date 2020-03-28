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

    public function updateJob(Request $request)
    {
       $job = Job::find($request->id);

        if ($job){
            $job->state = $request->state;
            $job->submitter_id = $request->submitter_id;
            $job->processor_id = $request->processor_id;
            $job->save();
            return response()->json([
                'message' => 'Job has been updated successfully!',
            ]);
        }else{
            return response()->json([
                'message' => 'An error ocurred. Please try again',
            ]);
        }
    }

    public function allProcessors()
    {
        $processors = Processor::all();
        return response()->json($processors);
    }

    // this function find a job by id
    // submitter can search a job by and id.
    public function findJobById(Request $request)
    {
        $job = Job::find($request->all());
        return response()->json($job);
    }
}
