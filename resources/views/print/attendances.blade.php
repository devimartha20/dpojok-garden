<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Absensi Pegawai</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .thead-primary {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        .mb-4 {
            margin-bottom: 1.5rem;
        }
        .h5 {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3 class="h5 mb-4 text-center">Laporan Absensi Pegawai</h3>
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
                </div>
            </div>
        </div>
    </section>
</body>
</html>
