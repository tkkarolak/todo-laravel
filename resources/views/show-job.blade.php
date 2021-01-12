<x-default-layout>
    <x-slot name="title">
        @lang('general.Job Details')
    </x-slot>
    <x-auth-card>
        @if (session('error'))
        <div class="alert alert-warning" role="alert">
            {{session('error')}}
        </div>
        @endif
        <div class="row">
            <div class="col-10">
                <h1>{{ $job->title }}</h1>
            </div>
            <div class="col-2 d-flex justify-content-end">
                <h1><span class="badge priority-{{ $job->priority->slug }}">@lang('slug.'.$job->priority->slug)</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @foreach ($job->tags as $tag)
                    <span class="badge" style="background-color: {{ $tag->color }};">@lang('tags.'.$tag->tag)</span>
                @endforeach
            </div>
        </div>
        <div class="row f-flex mt-4">
            <div class="col">
                <h2>@lang('jobs.Description'):</h2>
                <p>{{ $job->description }}</p>
            </div>
            <div class="col">
                <h2>@lang('jobs.Details'):</h2>
                <p>@lang('jobs.Deadline'): {{ $job->deadline }}</p>
                <p>@lang('jobs.Status'):
                    @if ($job->executed === 1)
                        @lang('jobs.Executed')
                     @else
                        @lang('jobs.Not executed')
                    @endif
                </p>
                <p>@lang('jobs.Created at'): {{ $job->created_at }}</p>
                <p>@lang('jobs.Last edited'): {{ $job->updated_at }}</p>
                <p>@lang('jobs.Author'): {{ $job->user->name }}</p>
            </div>
        </div>
        <div class="row">
            <div>
                <form action="" method="POST" class="col d-flex justify-content-between">
                    @csrf
                    @method('DELETE')

                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('general.Back')
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop">
                          <li><a class="dropdown-item" href="{{ route('jobs.calendar', ['datetime' => $job->deadline]) }}">@lang('general.Calendar')</a></li>
                          <li><a class="dropdown-item" href="{{ route('jobs.list') }}">@lang('general.List')</a></li>
                        </ul>
                    </div>

                    <a href="{{ route('jobs.edit', ['id' => $job]) }}" class="btn btn-primary ms-auto me-1" role="button">@lang('general.Edit')</a>
                    <button type="submit" class="btn btn-danger">@lang('general.DELETE')</button>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-default-layout>
