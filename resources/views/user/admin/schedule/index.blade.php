@extends('layouts.main.layout')
@section('title')
    Jadwal Kerja
@endsection
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js"></script>
    <script>
        // Convert PHP array to JSON
        var events = @json($events);

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: events // Pass events as JSON
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
