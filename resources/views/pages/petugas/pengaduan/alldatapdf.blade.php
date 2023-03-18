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
        .logo{
            width: 40px;
        }
        .d-flex{
            display: flex;
        }
        .non-border{
            border: none;
        }
        hr{
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <table class="non-border">
        <tr class="non-border">
            <td class="non-border">
                <img src="https://kecamatanmegamendung.bogorkab.go.id/kecamatan/assets/images/logo-kabupaten.png"alt="" class="logo">
            </td>
            <td class="non-border">
                <h4>Pengaduan Masyarakat <br> Kecamatan Megamendung</h4>
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <h3> Pengaduan & Aspirasi Masyarakat Megamendung </h3><i>by admin</i>
    <br>
    <table border="1px">
        <tr>
            <th>No</th>
            <th>Tujuan pengaduan</th>
            <th>Pelapor</th>
            <th>Tanggal</th>
            <th>Judul</th>
            <th>Isi Pengaduan</th>
            <th>Status</th>
            <th>Ditanggapi oleh</th>
            <th>Ditanggapi Tanggal</th>
            <th>Isi Tanggapan</th>
        </tr>
        @foreach ($datas as $item)
        <tr>
            <td>{{ $loop->iteration ?? '-'}}</td>
            <td>{{ $item->village->name ?? '-'}}</td>
            <td>{{ $item->pengadu->name ?? '-'}}</td>
            <td>{{ $item->date ?? '-'}}</td>
            <td>{{ $item->judul ?? '-'}}</td>
            <td>{{ $item->isi ?? '-'}}</td>
            <td>{{ $item->status == '0' ? 'menunggu perivikasi' : $item->status}}</td>
            <td>{{ $item->tanggapan->petugas->name ?? '-'}}</td>
            <td>{{ $item->tanggapan->date ?? '-'}}</td>
            <td>{{ $item->tanggapan->isi ?? '-'}}</td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>
