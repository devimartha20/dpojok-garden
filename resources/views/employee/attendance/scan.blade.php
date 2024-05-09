@extends('layouts.main.layout')
@section('content')
<div class="container">
    <form id="attendanceForm" style="display: block;" action="{{ route('employee.scan.submit') }}" method="POST">
        @csrf
        <input type="radio" id="attendanceIn" name="attendanceType" value="in" selected required>
        <label for="attendanceIn">Masuk</label><br>
        <input type="radio" id="attendanceOut" name="attendanceType" value="out" required>
        <label for="attendanceOut">Pulang</label><br>
        <input type="hidden" name="decodedText" id="decodedText">
        <button type="submit" id="submitBtn" style="display: none;">Submit</button>
    </form>
    <div id="reader" width="600px"></div>

</div>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        // Set the scanned text in a hidden input field
        document.getElementById('decodedText').value = decodedText;
        // Automatically submit the form
        document.getElementById('attendanceForm').submit();
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
