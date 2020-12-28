@extends('layouts.default', ['title' => 'Job details'])

@section('content')
<div class="container-bg">
    <div class="container">
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
                <h2>@lang('jobs.Jobs description'):</h2>
                <p>{{ $job->description }}</p>
            </div>
            <div class="col">
                <h2>@lang('jobs.Details'):</h2>
                <p>Deadline: {{ $job->deadline }}</p>
                <p>Status:
                    @if ($job->executed === 1)
                        Wykonane
                     @else
                         Niewykonane
                    @endif
                </p>
                <p>Utworzono: {{ $job->created_at }}</p>
                <p>Ostatnia edycja: {{ $job->updated_at }}</p>
            </div>
        </div>
        <div class="row">
            <div>
                <form action="" method="POST" class="col d-flex justify-content-between">
                    @csrf
                    @method('DELETE')

                    {{-- <div class="btn-group" role="group">
                        <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          Wstecz
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop">
                          <li><a class="dropdown-item" href="{{ route('jobs.calendar', ['datetime' => $job->deadline]) }}">Kalendarz</a></li>
                          <li><a class="dropdown-item" href="{{ route('jobs.list') }}">Lista</a></li>
                        </ul>
                      </div> --}}

                    <a href="{{ route('jobs.calendar', ['datetime' => $job->deadline]) }}" class="btn btn-primary" role="button">Wstecz</a>
                    <a href="{{ route('jobs.edit', ['id' => $job]) }}" class="btn btn-primary ms-auto me-1" role="button">Edytuj</a>
                    <button type="submit" class="btn btn-danger">USUŃ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
