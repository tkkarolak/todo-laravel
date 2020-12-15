<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index() {

        $jobs = Job::with('priority')->with('tags')->get();

        return view('jobs', ['jobs' => $jobs]);
    }

    public function calendar(Request $request) {
        if (is_null($request)) {
            $datetime = Carbon::now();
        } else {
            $datetime = Carbon::parse($request->datetime);
        }

        return view('calendar', ['datetime' => $datetime]);
   // dd($datetime);

    }
}
