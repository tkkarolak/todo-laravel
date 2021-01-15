<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Priority;
use App\Models\Tags;
use App\Models\User;
use App\Services\Jobs\JobAcceptService;
use App\Services\Jobs\JobDestroyService;
use App\Services\Jobs\JobStoreService;
use App\Services\Jobs\JobUpdateService;
use App\Services\JobService;
use App\ViewModels\Jobs\JobCalendarViewModel;
use App\ViewModels\Jobs\JobCreateViewModel;
use App\ViewModels\Jobs\JobEditViewModel;
use App\ViewModels\Jobs\JobIndexViewModel;
use App\ViewModels\Jobs\JobShowViewModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index(JobIndexViewModel $jobIndexViewModel)
    {

        return view('jobs', $jobIndexViewModel);
    }

    public function calendar(JobCalendarViewModel $jobCalendarViewModel)
    {
        return view('calendar', $jobCalendarViewModel);
    }

    public function show (JobShowViewModel $jobShowViewModel)
    {
        return view('show-job', $jobShowViewModel);
    }

    public function create(JobCreateViewModel $jobCreateViewModel)
    {
        return view('create-job', $jobCreateViewModel);
    }

    public function store(JobService $jobService, JobRequest $jobRequest)
    {
        if ($jobService->store($jobRequest) == false) {
            return redirect()->back()->with('error', 'Blad!');

        } else {

            return redirect('jobs/list')->with('success', 'Utworzono zadanie!');

        }
    }

    public function edit(JobEditViewModel $jobEditViewModel)
    {

        return view('edit-job', $jobEditViewModel);

    }

    public function update(JobService $jobService, Request $request, JobRequest $jobRequest)
    {
        if ($jobService->update($request, $jobRequest) == false) {

            return redirect()->back()->with('error', 'Blad!');
        } else {

            return redirect('jobs/list')->with('success', 'Edytowano zadanie!');
        }
    }

    public function accept(JobService $jobService, Request $request)
    {
        $jobService->accept($request);

        return redirect('jobs/list');
    }

    public function destroy(JobService $jobService, Request $request)
    {
        if ($jobService->destroy($request) == false) {
            return redirect()->back()->with('error', 'Blad!');
        } else {
            return redirect('jobs/list')->with('success', 'Usunieto zadanie!');
        }
    }
}
