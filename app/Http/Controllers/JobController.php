<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Priority;
use App\Models\Tags;
use App\Models\User;
use Carbon\Carbon;
use Exception;
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

    public function store(JobRequest $jobRequest)
    {
        $data = collect($jobRequest->validated());
        $data->put('user_id', 1);
        $data->put('executed', false);

        try {
            Job::create($data->toArray());

        } catch(Exception $e) {

            return redirect()->back()->with('error', 'Blad!');
        }

        return redirect('jobs/list')->with('success', 'Utworzono zadanie!');
    }

    public function edit(Request $request) {

        $id = $request->id;

        $job = Job::where('id', $id)
        ->with('priority')
        ->with('tags')
        ->first();

        $priorities = Priority::all();
        $tags = Tags::all();

        return view('edit-job',['id' => $id, 'job' => $job, 'priorities' => $priorities, 'tags' => $tags]);

    }

    public function update(Request $request, JobRequest $jobRequest) {

        $id = $request->id;

        try {

            Job::where('id', $id)
            ->update($jobRequest->validated());


        } catch(Exception $e) {

            return redirect()->back()->with('error', 'Blad!');
        }

        return redirect('jobs/list')->with('success', 'Edytowano zadanie!');

    }

    public function accept(Request $request) {

        $id = $request->id;
        $job = Job::where('id', $id)->first();

        $executed = $job->executed;

        if ($executed == 0) {
            $executed = 1;
        }
        else {
            $executed = 0;
        }

        Job::where('id', $id)
        ->update(['executed' => $executed]);

        return redirect('jobs/list');

    }

    public function destroy(Request $request) {

        $id = $request->id;

        try {

            Job::destroy($id);

        } catch(Exception $e) {

            return redirect()->back()->with('error', 'Blad!');
        }

        return redirect('jobs/list')->with('success', 'Usunieto zadanie!');

    }
}
