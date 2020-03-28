<?php

namespace App\Http\Controllers;

use App\Jobs\StoreProcessJob;
use App\Submitter;
use Illuminate\Http\Request;
use App\Job;
use App\Processor;

class JobController extends Controller
{
    // This function return only the pending jobs and
    // 'high' priority.
 	  public function all()
    {
        $jobs = Job::where('state' , '0')->where('priority', 'high')->get();
        return response()->json($jobs);
    }

    public function store(Request $request)
    {
        $message = 'Job has been created successfully!';
        try{
            $request->validate([
                'priority' 		=> 'required',
                'description' 	=> 'required',
                'name' 			=> 'required',
                'state' => 'required',
                'processor_id' => 'required'
            ]);

            $job = Job::create($request->all());

        }catch(Exception $ex){
            $message = 'An error ocurred, please try again later.';
        }
        return response()->json([
            'message' => $message
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

    public function allSubmitters()
    {
        $subm = Submitter::all();
        return response()->json($subm);
    }

    // this function find a job by id
    // submitter can search a job by and id.
    public function findJobById(Request $request)
    {
        $job = Job::find($request->all());
        return response()->json($job);
    }
}