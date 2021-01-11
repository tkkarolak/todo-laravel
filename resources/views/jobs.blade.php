<x-default-layout>
    <x-slot name="title">
        To Do List
    </x-slot>
    <x-auth-card>
        <div class="row mb-1">
            <div class="col-md-11 d-flex align-self-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">@lang('general.List')</li>
                        <li class="breadcrumb-item"><a href="{{ route('jobs.calendar') }}">@lang('general.Calendar')</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-1 d-flex justify-content-end">
                <a href="{{ route('jobs.create') }}" class="btn-add-job" role="button">+</a>
            </div>
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
                        <th scope="col">@lang('jobs.Title')</th>
                        <th scope="col">@lang('jobs.Priority')</th>
                        <th scope="col">@lang('jobs.Deadline')</th>
                        <th scope="col">@lang('jobs.Tags')</th>
                        <th scope="col">@lang('jobs.Executed')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobs as $job)
                        <tr>
                        <th scope="row">{{ $job->id }}</th>
                        {{-- <td>{{ $job->user_id }}</td> --}}
                        <td><a href="{{ route('jobs.details',['id' => $job->id]) }}">{{$job->title}}</a></td>
                        <td style>@lang('slug.'.$job->priority->slug)</td>
                        <td>{{ $job->deadline }}</td>
                        <td>
                            @foreach ($job->tags as $tag)
                                <span class="badge" style="background-color: {{ $tag->color }};">@lang('tags.'.$tag->tag)</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('jobs.accept',['id' => $job->id]) }}"><span class="mdi @if ($job->executed == 1)mdi-checkbox-marked-outline @else mdi-checkbox-blank-outline @endif"></span></a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-auth-card>
</x-default-layout>
