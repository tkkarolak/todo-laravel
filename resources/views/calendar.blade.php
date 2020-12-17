@extends('layouts.default', ['title' => 'Calendar'])

    @section('content')
    <div class="container-bg">
        <div class="container">
            <div class="row">
                <div class="col"><h1 style="text-align: center">{{ $datetime->localeMonth }} {{ $datetime->year }}</h1></div>
            </div>
            <div class="row">
                <div class="col d-flex justify-content-end mb-1">
                    <a href="{{ route('jobs.calendar', ['datetime' => $datetime->copy()->subMonth()]) }}" class="btn btn-primary me-1" role="button">-1 miesiac</a>
                    <a href="{{ route('jobs.calendar', ['datetime' => $datetime->copy()->now()]) }}" class="btn btn-primary me-1" role="button">Dzisiaj</a>
                    <a href="{{ route('jobs.calendar', ['datetime' => $datetime->copy()->addMonth()]) }}" class="btn btn-primary" role="button">+1 miesiac</a>
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
                                                        {{-- <span style="background-color: {{ $event['color'] }}">{{ $event['title'] }}</span> --}}
                                                        <span class="badge priority-{{ $event['slug'] }}">{{ $event['title'] }}</span>
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
        </div>
    </div>
@endsection

