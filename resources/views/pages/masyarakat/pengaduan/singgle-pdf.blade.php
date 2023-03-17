<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pengaduan Masyarakat megamendung | pdf</title>
    <style>
        .text-center{
            text-align: center;
        }
        .new-page {
            page-break-before: always;
        }
        .fs-i{
            color: gray;
            font-style: italic;
            font-size: 15px;
        }
        .img{
            width: 150px;
        }
    </style>
</head>
<body>
    <span class="text-center fs-i">Pengaduan masyarakat kecamatan megamendung</span>
    <br><br><br><br>
    <h1 class="text-center">{{ $data->judul ?? '-'}}</h1>
    <br>
    <table>
        <tr>
            <td>pelapor</td>
            <td>:</td>
            <td>{{ $data->pengadu->name ?? '-'}}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ $data->date ?? '-'}}</td>
        </tr>
        <tr>
            <td>Kategory</td>
            <td>:</td>
            <td>{{ $data->category->name ?? '-'}}</td>
        </tr>
        <tr>
            <td>Tujuan pengaduan</td>
            <td>:</td>
            <td>{{ 'Desa '. $data->village->name ?? '-'}}</td>
        </tr>
        <tr>
            <td>status</td>
            <td>:</td>
            <td>{{ $data->status ?? '-'}}</td>
        </tr>
    </table>
    <br>
    <p>
        {{ $data->isi}} 
    </p>
    <div class="new-page"></div>
    @if (isset($data->tanggapan))
    <span class="text-center fs-i">Pengaduan masyarakat kecamatan megamendung</span>
    <br><br>
    <h1 class="text-center">Tanggapan</h1>
    <br>
    <table>
        <tr>
            <td>petugas</td>
            <td>:</td>
            <td>{{ $data->tanggapan->petugas->name ?? '-'}}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ $data->tanggapan->date}}</td>
        </tr>
    </table>
    <p>{{ $data->tanggapan->isi}}</p>
    @endif
</body>
</html>