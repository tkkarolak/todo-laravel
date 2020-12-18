@extends('layouts.default', ['title' => 'Dodaj zadanie'])

@section('content')
    <div class="container-bg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="POST">
                        @csrf

                        <div class="row">
                            <label for="title">Title: </label>
                            <input type="text" name="title" id="title" required>
                        </div>

                        <div class="row">
                            <label for="description">Description: </label>
                            <textarea type="text" name="description" id="description" required></textarea>
                        </div>

                        <div class="form-group">
                            Priority:<br>
                            <input type="radio" name="priority" id="priority1">
                            <label for="priority1">High</label><br>
                            <input type="radio" name="priority" id="priority2">
                            <label for="priority2">Moderate</label><br>
                            <input type="radio" name="priority" id="priority3">
                            <label for="priority3">Low</label>
                        </div>

                        <div class="row">
                            <label for="deadline">Deadline: </label>
                            <input type="datetime-local" name="deadline" id="deadline">
                        </div>

                        <div class="form-group">
                            <label for="executed">Executed: </label>
                            <input type="checkbox" name="executed" id="executed">
                        </div>

                        {{-- <div class="form-group"> --}}

                        <div>
                            <button type="submit" class="btn btn-primary">Zapisz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
