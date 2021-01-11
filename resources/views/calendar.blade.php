<x-default-layout>
    <x-slot name="title">
        Calendar
    </x-slot>
    <x-auth-card>
{{-- @section('content')
    <div class="container-bg">
        <div class="container"> --}}
            <div class="row">
                <nav aria-label="breadcrumb" class="d-flex align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('jobs.list') }}">@lang('general.List')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('general.Calendar')</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex self-align-center"><h2>{{ $datetime->localeMonth }} {{ $datetime->year }}</h2></div>
                <div class="col md-6 mb-1 d-flex justify-content-end">
                    <a href="{{ route('jobs.calendar', ['datetime' => $datetime->copy()->subMonth()]) }}" class="btn btn-primary me-1" role="button">-1 @lang('general.month')</a>
                    <a href="{{ route('jobs.calendar', ['datetime' => $datetime->copy()->now()]) }}" class="btn btn-primary me-1" role="button">@lang('general.Today')</a>
                    <a href="{{ route('jobs.calendar', ['datetime' => $datetime->copy()->addMonth()]) }}" class="btn btn-primary" role="button">+1 @lang('general.month')</a>
                </div>
            </div>

            @php
                $dt = Carbon\Carbon::createFromDate($datetime->year, $datetime->month, 1);
            @endphp

            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">@lang('calendar.Monday')</th>
                                <th scope="col">@lang('calendar.Tuesday')</th>
                                <th scope="col">@lang('calendar.Wednesday')</th>
                                <th scope="col">@lang('calendar.Thursday')</th>
                                <th scope="col">@lang('calendar.Friday')</th>
                                <th scope="col">@lang('calendar.Saturday')</th>
                                <th scope="col">@lang('calendar.Sunday')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @while ($dt->month === $datetime->month)
                                    <tr>
                                        @for ($i=0; $i<7; $i++)
                                            <td class="calendar-cell">
                                                <div class="calendar-cell-content">
                                                    <span class="@if ($dt->weekday($i)->month !== $datetime->month) calendar-cell-content-day @endif">
                                                        {{ $dt->weekday($i)->format('d') }}
                                                    </span>
                                                    @php
                                                        $temp = $events->where('deadline', $dt->weekday($i)->format('Y-m-d'));
                                                    @endphp
                                                    @foreach($temp->toArray() as $event)
                                                        <span class="badge priority-{{ $event['slug'] }}"><a href="{{ route('jobs.details', ['id' => $event['id']]) }}" class="plain">{{ $event['title'] }}</a></span>
                                                    @endforeach
                                                </div>
                                            </td>
                                        @endfor
                                    </tr>
                                    @php
                                        $dt->weekday(0);
                                        $dt->addWeek();
                                    @endphp
                                @endwhile
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- </div>
    </div>
@endsection --}}
    </x-auth-card>
</x-default-layout>

