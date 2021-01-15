<?php

namespace App\ViewModels\Jobs;

use App\Models\Job;
use App\Models\Priority;
use App\Models\Tags;
use Illuminate\Http\Request;
use Spatie\ViewModels\ViewModel;

class JobEditViewModel extends ViewModel
{
    /**
     * Model zadania
     *
     * @var \App\Models\Job
     */
    private $job;

    /**
     * Model priorytetu
     *
     * @var \App\Models\Priority
     */
    private $priority;

    /**
     * Obiekt żądania
     *
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * Model tagu
     *
     * @var \App\Models\Tags
     */
    private $tags;

    /**
     * Utwórz nową instację modelu widoku
     *
     * @param \App\Models\Job          $job
     * @param \App\Models\Priority     $priority
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tags         $tags
     */
    public function __construct(Job $job, Priority $priority, Request $request, Tags $tags)
    {
        $this->job = $job;
        $this->priority = $priority;
        $this->request = $request;
        $this->tags = $tags;
    }

    public function id()
    {
        return $this->request->id;
    }

    public function job()
    {
        return $this->job
            ->where('id', $this->request->id)
            ->with('priority')
            ->with('tags')
            ->first();
    }

    public function priorities()
    {
        return $this->priority->all();
    }

    public function tags()
    {
        return $this->tags->all();
    }
}
