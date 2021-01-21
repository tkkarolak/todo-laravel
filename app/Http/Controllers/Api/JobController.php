<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\JobRequest;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job             $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return JobResource::collection(Job::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job             $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return new JobResource($job);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Api\JobRequest    $jobRequest
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $jobRequest)
    {
        $job = Job::create($jobRequest->all());
        $job->tags()->attach($jobRequest->tag);

        return new JobResource($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Api\JobRequest $jobRequest
     * @param  \App\Models\Job                 $job
     * @return \Illuminate\Http\Response
     */
    public function update(Job $job, JobRequest $jobRequest)
    {

        $job->update($jobRequest->validated());
        $job->tags()->sync($jobRequest->tag);

        return new JobResource($job);
    }
}
