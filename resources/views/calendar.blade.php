@extends('layouts.default', ['title' => 'Calendar'])

    @section('content')
    <div class="container-bg">
        <div class="container">
            <div class="row">
                <div class="col"><h1>{{$datetime->month}} {{$datetime->year}}</h1></div>
            </div>
            <div class="row">
                <div class="col"><a href="{{route('jobs.calendar', ['datetime' => $datetime->copy()->now()])}}" class="btn btn-primary" role="button">Dzisiaj</a></div>
                <div class="col"><a href="{{route('jobs.calendar', ['datetime' => $datetime->copy()->addMonth()])}}" class="btn btn-primary" role="button">+1 miesiac</a></div>
                <div class="col"><a href="{{route('jobs.calendar', ['datetime' => $datetime->copy()->subMonth()])}}" class="btn btn-primary" role="button">-1 miesiac</a></div>
            </div>

            @php
                $dt = Carbon\Carbon::createFromDate($datetime->year, $datetime->month, 1);
            @endphp

            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Mon</th>
                                <th scope="col">Tue</th>
                                <th scope="col">Wed</th>
                                <th scope="col">Thu</th>
                                <th scope="col">Fri</th>
                                <th scope="col">Sat</th>
                                <th scope="col">Sun</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @while ($dt->month === $datetime->month)
                                    <tr>
                                        @for ($i=0; $i<7; $i++)
                                            <td class="calendar-cell">
                                                <div class="calendar-cell-content">
                                                    {{$dt->weekday($i)->format('d')}}
                                                    @php
                                                        $temp = $events->where('deadline', $dt->weekday($i)->format('Y-m-d'));
                                                    @endphp
                                                    @foreach($temp->toArray() as $event)
                                                        {{$event['title']}}
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
            {{-- <div class="row">
                <ul>
                @foreach ($events as $event)
                <li>{{$event->title}} {{$event->deadline}}</li>
                @endforeach
                </ul>
            </div> --}}
        </div>
    </div>
@endsection

