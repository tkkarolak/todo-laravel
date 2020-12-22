<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Priority;
use App\Models\Tags;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {

        $jobs = Job::with('priority')->with('tags')->get();

        return view('jobs', ['jobs' => $jobs]);
    }

    public function calendar(Request $request)
    {
        if (is_null($request)) {
            $datetime = Carbon::now();
        } else {
            $datetime = Carbon::parse($request->datetime);
        }

        $events = Job::whereYear('deadline', $datetime->year)
            ->whereMonth('deadline', $datetime->month)
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

        return view('calendar', ['datetime' => $datetime, 'events' => $events]);
    }

    public function show (Request $request)
    {
        $id = $request->id;

        $job = Job::where('id', $id)
        ->with('priority')
        ->with('tags')
        ->first();

        return view('show-job', ['id' => $id, 'job' => $job]);
    }

    public function create() {

        $priorities = Priority::all();
        $tags = Tags::all();


        return view('create-job', ['priorities' => $priorities, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:50'],
            'description' => ['required'],
            // 'priority.slug' => ['required'],
            'deadline' => ['after_or_equal:today'],
            // 'executed' => ['required'],

        ]);

        return redirect()->back();
    }

    public function edit() {

        return view('edit-job');

    }
}
