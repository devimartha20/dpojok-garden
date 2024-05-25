@extends('layouts.main.layout')
@section('title')
    Jadwal Kerja
@endsection
@section('styles')
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
    <div id="calendar"></div>
@endsection
@section('scripts')

@endsection
