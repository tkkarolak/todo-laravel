<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(){

        $jobs = Job::all();

        return view('jobs', ['jobs' => $jobs]);
    }
}
