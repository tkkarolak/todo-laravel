<?php

namespace App\ViewModels\Jobs;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class JobShowViewModel extends ViewModel
{
    /**
     * Model zadania
     *
     * @var \App\Models\Job
     */
    private $job;

    /**
     * Obiekt żądania
     *
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * Utwórz nową instancję modelu widoku
     *
     * @param \App\Models\Job          $job
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Job $job, Request $request)
    {
        $this->job = $job;
        $this->request = $request;
    }

    /**
     * Zwróć id zadania
     *
     * @return  hmmm?
     */
    public function id()
    {
        // dd($this->request->id);
        return $this->request->id;
    }

    /**
     * Zwróć model zadania o wybranym id
     *
     * @return \App\Models\Job
     */
    public function job()
    {
        return $this->job
            ->where('id', $this->request->id)
            ->with('priority')
            ->with('tags')
            ->with('user')
            ->first();
    }
}
