@extends('layouts.default', ['title' => 'To Do List'])

        @section('content')
        <div class="container-bg">
        <div class="container">
            <div class="row">
                <nav aria-label="breadcrumb" class="d-flex align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                        <li class="breadcrumb-item"><a href="{{ route('jobs.calendar') }}">Calendar</a></li>
                    </ol>
                </nav>
            </div>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
            @endif
            <div class="column">
                <table class="table table-borderless table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        {{-- <th scope="col">User_id</th> --}}
                        <th scope="col">@lang('jobs.title')</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">@lang('jobs.priority')</th>
                        <th scope="col">@lang('jobs.deadline')</th>
                        <th scope="col">@lang('jobs.executed')</th>
                        <th scope="col">@lang('jobs.tags')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                        <th scope="row">{{ $job->id }}</th>
                        {{-- <td>{{ $job->user_id }}</td> --}}
                        <td><a href="{{ route('jobs.details',['id' => $job->id])}}">{{$job->title}}</a></td>
                        {{-- <td>{{ $job->description }}</td> --}}
                        <td style>@lang('slug.'.$job->priority->slug)</td>
                        <td>{{ $job->deadline }}</td>
                        <td>{{ $job->executed }}</td>
                        <td>
                        @foreach ($job->tags as $tag)
                            <span class="badge" style="background-color: {{ $tag->color }};">@lang('tags.'.$tag->tag)</span>
                        @endforeach
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        @endsection
