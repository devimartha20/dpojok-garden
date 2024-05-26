@extends('layouts.main.layout')
@section('title')
    Jadwal Kerja
@endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js'></script>
<script>
    // Convert PHP array to JSON
    var events = @json($events);

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        slotMinTime: '06:00:00',
        firstDay: 1,
        events: events
        });
        calendar.render();
    });
</script>
@endsection
@section('content')
<div class="">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if($errors->any())
                        {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
                    @endif
                   
                </div>
                <div class="card-body">
                    {{-- CALENDAR --}}
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Daftar Hari Libur
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($holidays as $holiday)
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $holiday->name }}</strong><br>
                                    <small class="text-muted">{{ $holiday->start_date->format('F j, Y, g:i a') }} - {{ $holiday->end_date->format('F j, Y, g:i a') }}</small>
                                </div>

                            </li>
                            <!-- Repeat for other holidays -->
                        </ul>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection
