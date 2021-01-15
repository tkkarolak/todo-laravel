<?php

namespace App\ViewModels\Jobs;

use App\Models\Job;
use Spatie\ViewModels\ViewModel;

class JobIndexViewModel extends ViewModel
{
    /**
     * Model zadania
     *
     * @var \App\Models\Job
     */
    private $job;

    /**
     * Utwórz nową instancję modelu widoku
     *
     * @param \App\Models\Job $job
     */
    public function __construct(Job $job)
    {
        $this->job = $job;

    }

    public function jobs()
    {
        return $this->job->with('priority')->with('tags')->get();

    }

}
