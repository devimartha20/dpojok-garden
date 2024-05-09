@extends('layouts.main.layout')
 <!-- Notification.css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('main') }}/assets/pages/notification/notification.css">
@section('content')
<div class="container">
    @if (Session::has('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <form id="attendanceForm" style="display: block;" action="{{ route('employee.scan.submit') }}" method="POST">
        @csrf
        <input type="radio" id="attendanceIn" name="attendanceType" value="in" checked required>
        <label for="attendanceIn">Masuk</label><br>
        <input type="radio" id="attendanceOut" name="attendanceType" value="out" required>
        <label for="attendanceOut">Pulang</label><br>
        <input type="hidden" name="decodedText" id="decodedText">
    </form>
    <div id="reader" width="600px"></div>
</div>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    let pageLoaded = false; // Flag to indicate whether the page has finished loading

    // Add event listener for page load
    window.addEventListener('load', function() {
        pageLoaded = true;
    });

    let scanningActive = true; // Flag to track whether scanning is active

    function onScanSuccess(decodedText, decodedResult) {
        // Check if scanning is active and the page has finished loading before submitting the form
        if (scanningActive && document.readyState === 'complete') {
            // Set the scanned text in a hidden input field
            document.getElementById('decodedText').value = decodedText;
            // Automatically submit the form
            document.getElementById('attendanceForm').submit();
            // Disable scanning after successful scan
            scanningActive = false;
        }
    }

    function onScanFailure(error) {
        // Handle scan failure, usually better to ignore and keep scanning.
        // For example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);

    // Add event listener for form submission
    document.getElementById('attendanceForm').addEventListener('submit', function(event) {
        // Get the selected attendance type
        let attendanceType = document.querySelector('input[name="attendanceType"]:checked').value;
        // Add the attendance type as a hidden input field
        let attendanceTypeInput = document.createElement('input');
        attendanceTypeInput.type = 'hidden';
        attendanceTypeInput.name = 'attendanceType';
        attendanceTypeInput.value = attendanceType;
        // Append the attendance type input to the form
        document.getElementById('attendanceForm').appendChild(attendanceTypeInput);

        // Get the scanned text
        let decodedText = document.getElementById('decodedText').value;
        // Add the decoded text as a hidden input field
        let decodedTextInput = document.createElement('input');
        decodedTextInput.type = 'hidden';
        decodedTextInput.name = 'decodedText';
        decodedTextInput.value = decodedText;
        // Append the decoded text input to the form
        document.getElementById('attendanceForm').appendChild(decodedTextInput);
    });
</script>
@endsection
@section('scripts')
<!-- notification js -->
<script type="text/javascript" src="{{ asset('main/assets/js/bootstrap-growl.min.js') }}"></script>
<script>
    function notify(from, align, icon, type, animIn, animOut, msg, title){
        $.growl({
            icon: icon,
            title: title,
            message: msg,
            url: ''
        },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            icon_type: 'class',
            template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
        });
    };

</script>
@if (Session::has('success'))
<script>
var nFrom = 'top';
var nAlign = 'right';
var nIcons = 'fa fa-check';
var nType = 'success';
var nAnimIn = 'animated fadeIn';
var nAnimOut = 'animated fadeInLeft';
var msg = "{{ Session::get('success') }}";
var title = "Sukses! ";

notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, msg, title);
</script>
@endif

@if (Session::has('fail'))
<script>
var nFrom = 'top';
var nAlign = 'right';
var nIcons = 'fa fa-comments';
var nType = 'danger';
var nAnimIn = 'animated fadeIn';
var nAnimOut = 'animated fadeInLeft';
var msg = "{{ Session::get('fail') }}";
var title = "Gagal! ";

notify(nFrom, nAlign, nIcons, nType, nAnimIn, nAnimOut, msg, title);
</script>
@endif
@endsection
