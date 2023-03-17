<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
    <style>
        body {
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 20px;
        color: #333333;
        }

        table, th, td {
        border: solid 1px #000;
        padding: 10px;
        }

        th{
            background-color: aqua;
        }

        table {
            border-collapse:collapse;
            caption-side:bottom;
        }
    </style>
</head>
<body>
    
    <h3> Pengaduan & Aspirasi Masyarakat Megamendung</h3>
    <br>
    <hr>
    <br>
    <table border="1px">
        <tr>
            <th>no</th>
            <th>tujuan pengaduan</th>
            <th>kategory</th>
            <th>pelapor</th>
            <th>tanggal</th>
            <th>judul</th>
            <th>status</th>
        </tr>
        @foreach ($datas as $item)
        <tr>
            <td>{{ $loop->iteration ?? '-'}}</td>
            <td>{{ $item->village->name ?? '-'}}</td>
            <td>{{ $item->category->name ?? '-'}}</td>
            <td>{{ $item->pengadu->name ?? '-'}}</td>
            <td>{{ $item->date ?? '-'}}</td>
            <td>{{ $item->judul ?? '-'}}</td>
            <td>{{ $item->status == '0' ? 'menunggu perivikasi' : $item->status}}</td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>
