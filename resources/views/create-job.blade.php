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
                                    @if (old('priority') == $priority->id)
                                        <option selected value="{{ $priority->id }}">{{ $priority->slug }}</option>
                                    @else
                                        <option value="{{ $priority->id }}">{{ $priority->slug }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <label for="deadline" class="form-label">Deadline: </label>
                            <input type="datetime-local" name="deadline" id="deadline" class="form-input" value="{{ old('deadline')}}">

                            @error('deadline')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Zapisz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
