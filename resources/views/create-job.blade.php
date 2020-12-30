@extends('layouts.default', ['title' => 'Dodaj zadanie'])

@section('content')
    <div class="container-bg">
        <div class="container">
            @if (session('error'))
                <div class="alert alert-warning" role="alert">
                    {{session('error')}}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        @csrf

                        <div class="row">
                            <label for="title" class="form-label">Title: </label>
                            <input type="text" class="form-control is-invalid" name="title" id="title" value="{{ old('title')}}">

                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <label for="description" class="form-label">Description: </label>
                            <textarea type="text" class="form-control is-invalid" name="description" id="description"> {{ old('description')}}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <label for="priority_id" class="form-label">Priority:</label>
                            <select class="form-select" id="priority_id" name="priority_id">
                                <option value="">Wybierz...</option>
                                @foreach ($priorities as $priority)
                                    @if (old('priority_id') == $priority->id)
                                        <option selected value="{{ $priority->id }}">{{ $priority->slug }}</option>
                                    @else
                                        <option value="{{ $priority->id }}">{{ $priority->slug }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="row mb-3">
                            <label for="deadline" class="form-label">Deadline: </label>
                            <input type="datetime-local" name="deadline" id="deadline" class="form-input" value="{{ old('deadline')}}">

                            @error('deadline')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                  Tags:
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($tags as $tag)
                                        <li>
                                            <input type="checkbox" class="form-input" id="{{ $tag->tag }}" name="tag[]" value="{{ $tag->id }}">
                                            <span class="badge" style="background-color: {{ $tag->color }};">
                                                <label for="{{ $tag->tag }}" class="form-label">{{ $tag->tag }}</label>
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                              </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Zapisz</button>

                            <div class="btn-group d-flex align-self-center" role="group">
                                <button id="btnGroupDrop" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Wstecz
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop">
                                    <li><a class="dropdown-item" href="{{ route('jobs.calendar') }}">Kalendarz</a></li>
                                    <li><a class="dropdown-item" href="{{ route('jobs.list') }}">Lista</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
