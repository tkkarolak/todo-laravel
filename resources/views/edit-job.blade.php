<x-default-layout>
    <x-slot name="title">
        @lang('general.Job Edit')
    </x-slot>
    <x-auth-card>
        @if (session('error'))
            <div class="alert alert-warning" role="alert">
                {{session('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <form action="" method="POST">
                    @method('PATCH')
                    @csrf

                    <div class="row">
                        <label for="title" class="form-label">@lang('jobs.Title'): </label>
                        <input type="text" class="form-control is-invalid" name="title" id="title" value="{{ old('title', $job->title)}}">

                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="description" class="form-label">@lang('jobs.Description'): </label>
                        <textarea type="text" class="form-control is-invalid" name="description" id="description"> {{ old('description', $job->description)}}</textarea>

                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="priority_id" class="form-label">@lang('jobs.Priority'):</label>
                        <select class="form-control is-invalid" id="priority_id" name="priority_id">
                            <option value="">@lang('general.Choose')...</option>
                            @foreach ($priorities as $priority)
                                @if (old('priority_id', $job->priority_id) == $priority->id)
                                    <option selected value="{{ $priority->id }}">@lang('slug.'.$priority->slug)</option>
                                @else
                                    <option value="{{ $priority->id }}">@lang('slug.'.$priority->slug)</option>
                                @endif
                            @endforeach
                        </select>

                        @error('priority_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-1">
                        <label for="deadline" class="form-label">@lang('jobs.Deadline'): </label>
                        <input type="datetime-local" name="deadline" id="deadline" class="form-control is-invalid" value="{{ old('deadline', Carbon\Carbon::parse($job->deadline)->format('Y-m-d\TH:i')) }}">

                        @error('deadline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('jobs.Tags'):
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach ($tags as $tag)
                                    <li>
                                        <input type="checkbox" class="form-check-input" id="{{ $tag->tag }}" name="tag[]" value="{{ $tag->id }}"
                                            @if (old('tag') === null)
                                                @php
                                                    $ids = $job->tags->pluck('id');
                                                @endphp

                                                @foreach ($ids as $jobtag_id)
                                                    {{ $tag->id == $jobtag_id ? 'checked' : '' }}
                                                @endforeach

                                            @else
                                                {{ (is_array(old('tag')) && in_array($tag->id, old('tag'))) ? 'checked' : '' }}
                                            @endif
                                        />
                                        <span class="badge" style="background-color: {{ $tag->color }};">
                                            <label for="{{ $tag->tag }}" class="form-label">@lang('tags.'.$tag->tag)</label>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                          </div>
                    </div>

                    <div class="d-flex justify-content-between mt-1">
                        <a href="{{ route('jobs.details', ['id' => $job]) }}" class="btn btn-primary" role="button">@lang('general.Back')</a>
                        <button type="submit" class="btn btn-primary">@lang('general.Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </x-auth-card>
</x-default-layout>
