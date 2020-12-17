@extends('layouts.default', ['title' => 'Job details'])

@section('content')
<div class="container-bg">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>{{ $job->title }}</h1>
            </div>
            <div class="col-4 d-flex justify-content-center">
                {{-- {{ dd($job->priority->slug)}} --}}
                <h1><span class="badge bg-primary">{{ $job->priority->slug }}</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-start me-1">
                @foreach ($job->tags as $tag)
                    <span class="badge" style="background-color: {{ $tag->color }};">@lang('tags.'.$tag->tag)</span>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{ $job->description }}
            </div>
            <div class="col">
                {{ $job->executed }}
                {{ $job->created_at }}
                {{ $job->updated_at }}
            </div>
        </div>
    </div>
</div>
@endsection
