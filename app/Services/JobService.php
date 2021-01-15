<?php

namespace App\Services;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobService
{
    /**
     * Model zadania
     *
     * @var \App\Models\Job
     */
    private $job;

    /**
     * Utwórz nową instancję serwisu
     *
     * @param \App\Models\Job $job
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Zmień status zadania (wykonane/niewykonane).
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     */
    public function accept(Request $request)
    {
        $id = $request->id;
        $job = $this->job->where('id', $id)->first();

        $executed = $job->executed;

        if ($executed == 0) {
            $executed = 1;
        } else {
            $executed = 0;
        }

        $job->update(['executed' => $executed]);

    }

    /**
     * Usuń zadanie.
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     */
    public function destroy(Request $request)
    {
        try {
            $this->job->destroy($request->id);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Utwórz nowe zadanie.
     *
     * @param    App\Http\Requests\JobRequest $jobRequest
     * @return
     */
    public function store(JobRequest $jobRequest)
    {
        $data = collect($jobRequest->validated());

        $id = Auth::id();

        $data->put('user_id', $id);
        $data->put('executed', false);

        try {
            $this->job->create($data->toArray())->tags()->attach($jobRequest->tag);

        } catch (Exception $e) {

            return false;
        }

        return true;
    }

    /**
     * Edytuj istniejące zadanie.
     *
     * @param    Illuminate\Http\Request      $request
     * @param    App\Http\Requests\JobRequest $jobRequest
     * @return
     */
    public function update(Request $request, JobRequest $jobRequest)
    {
        try {
            $updatedjob = $this->job->where('id', $request->id)->first();
            $updatedjob->update($jobRequest->validated());
            $updatedjob->tags()->sync($jobRequest->tag);

        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}
