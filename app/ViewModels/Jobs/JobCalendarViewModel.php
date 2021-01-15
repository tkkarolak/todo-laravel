<?php

namespace App\ViewModels\Jobs;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\ViewModels\ViewModel;

class JobCalendarViewModel extends ViewModel
{
    /**
     * Obiekt daty i godziny
     *
     * @var \Carbon\Carbon
     */
    private $datetime;

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

        $this->initDatetime();

    }

    /**
     * Zwróć datę
     *
     * @return \Carbon\Carbon
     */
    public function datetime()
    {
        return $this->datetime;
    }

    /**
     * Pobierz wszystkie zadania z wybranego okresu
     *
     * @return \Illuminate\Support\Collection
     */
    public function events(): Collection
    {
        $events = $this->job->whereYear('deadline', $this->datetime->year)
            ->whereMonth('deadline', $this->datetime->month)
            ->with('priority')
            ->get();

        $events = $events->map(function ($event) {
            return [
                'title' => $event->title,
                'deadline' => substr($event->deadline, 0, 10),
                'slug' => $event->priority->slug,
                'id' => $event->id,
            ];
        });

        return $events;
    }

    /**
     * Przypisz datę
     *
     * @return void
     */
    private function initDatetime()
    {
        if (is_null($this->request->datetime)) {
            $this->datetime = Carbon::now();
        } else {
            $this->datetime = Carbon::parse($this->request->datetime);
        }
    }
}
