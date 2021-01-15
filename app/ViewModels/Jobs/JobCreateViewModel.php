<?php

namespace App\ViewModels\Jobs;

use App\Models\Priority;
use App\Models\Tags;
use Spatie\ViewModels\ViewModel;

class JobCreateViewModel extends ViewModel
{
    /**
     * Model priorytetu
     *
     * @var \App\Models\Priority
     */
    private $priority;

    /**
     * Model tagu
     *
     * @var \App\Models\Tags
     */
    private $tags;

    /**
     * Utwórz nową instację modelu widoku
     *
     * @param \App\Models\Priority $priority
     * @param \App\Models\Tags     $tags
     */
    public function __construct(Priority $priority, Tags $tags)
    {
        $this->priority = $priority;
        $this->tags = $tags;

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
