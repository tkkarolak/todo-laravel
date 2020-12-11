@extends('layouts.default', ['title' => 'To Do List'])

        @section('content')
        <div class="container-bg">
        <div class="container">
            <div class="column">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        {{-- <th scope="col">User_id</th> --}}
                        <th scope="col">Title</th>
                        {{-- <th scope="col">Description</th> --}}
                        <th scope="col">priority_id</th>
                        <th scope="col">deadline</th>
                        <th scope="col">executed</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                        <th scope="row">{{$job->id}}</th>
                        {{-- <td>{{$job->user_id}}</td> --}}
                        <td>{{$job->title}}</td>
                        {{-- <td>{{$job->description}}</td> --}}
                        <td>{{$job->priority_id}}</td>
                        <td>{{$job->deadline}}</td>
                        <td>{{$job->executed}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        @endsection
