<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('report') }}/css/style.css">
</head>
<body>
    <section class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 class="h5 mb-4 text-center">Laporan Absensi Pegawai</h3>
                    {{-- <form method="GET" action="{{ route('check.report.attendances') }}">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label for="start_date">Start Date:</label>
                                <input type="date" name="start_date" class="form-control mb-2" id="start_date" required value="{{ $startDate }}">
                            </div>
                            <div class="col-auto">
                                <label for="end_date">End Date:</label>
                                <input type="date" name="end_date" class="form-control mb-2" id="end_date" required value="{{ $endDate }}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-2">Filter</button>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Id Pegawai</th>
                                    <th>Nama Pegawai</th>
                                    <th>Masuk</th>
                                    <th>Sakit (Hari)</th>
                                    <th>Izin (Hari)</th>
                                    <th>Tanpa Keterangan (Hari)</th>
                                    <th>Cuti (Kali)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($attendanceData as $index => $data)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data['employee_id'] }}</td>
                                    <td>{{ $data['employee_name'] }}</td>
                                    <td>{{ $data['present_days'] }}</td>
                                    <td>{{ $data['sick_days'] }}</td>
                                    <td>{{ $data['permission_days'] }}</td>
                                    <td>{{ $data['unexplained_absences'] }}</td>
                                    <td>{{ $data['leave_count'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="alert alert-warning mt-4">
                        No attendance data found for the selected date range.
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
