@extends('layout.app')

@push('css')
    <style>
        .count-pengaduan{
            font-size: 50px;
        }
        .bg-warrning{
            background-color: rgba(207, 207, 4, 0.738);
            color: white;
        }
        .bg-danger{
            background-color: rgb(213, 50, 50);
            color: white;
        }
        .bg-primary{
            background-color: rgba(8, 70, 152, 0.705);
            color: white;
        }
        .bg-primary-0{
            background-color: rgba(51, 133, 240, 0.705);
            color: white;
        }
        .bg-succes{
            background-color: rgba(4, 145, 4, 0.705);
            color: white;

        }
        .count-pengaduan{
            font-size: 80px;
        }
        .link-no-style{
            text-decoration: inherit;
            cursor: pointer;
        }
        .informasi{
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            letter-spacing: 0px;
        }
        footer {
            text-align: center;
            padding: 3px;
            background-color: DarkSalmon;
            color: white;
        }
    </style>
@endpush

@section('content')

<div class="h2 mt-5 fw-bold text-primary">Pengaduan Masyarakat Kecamatan Megamendung</div>
<hr>
<div class="row">
    <div class="col-3">
        <div class="card shadow bg-warrning">
            <div class="card-body">
                <span class=" fst-italic">Pengaduan</span>
                <div class="d-flex mt-4 justify-content-center">
                    <div class="h4 mt-4">Menunggu</div>
                    <div class="count-pengaduan fw-bold">{{ $cardPengaduan['0']}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card shadow bg-primary">
            <div class="card-body">
                <span class=" fst-italic">Pengaduan</span>
                <div class="d-flex mt-4 justify-content-center text-center align-center">
                    <div class="h4 mt-4">Dalam Proses</div>
                    <div class="count-pengaduan fw-bold">{{ $cardPengaduan['proses']}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card shadow bg-succes">
            <div class="card-body">
                <span class=" fst-italic">Pengaduan</span>
                <div class="d-flex mt-4 justify-content-center text-center align-center">
                    <div class="h4 mt-4">Selesai</div>
                    <div class="count-pengaduan fw-bold">{{ $cardPengaduan['selesai']}}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card shadow bg-succes">
            <div class="card-body">
                <span class=" fst-italic">Pengaduan</span>
                <div class="d-flex mt-4 justify-content-center text-center align-center">
                    <div class="h4 mt-4">Total</div>
                    <div class="count-pengaduan fw-bold">{{ $cardPengaduan['total']}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table mt-3 table-responsive">
    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tujuan</th>
                <th>Kategori</th>
                <th>Pelapor</th>
                <th>Dilaporkan tanggal</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Status</th>
                <th>Ditanggapi tanggal</th>
                <th>Ditanggapi oleh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $item)
            <tr>
                <td>{{ $loop->iteration}}</td>
                <td>{{'desa '. $item->village->name ?? '-'}}</td>
                <td>{{ $item->category->name ?? '-'}}</td>
                <td>{{ $item->pengadu->name ?? '-'}}</td>
                <td>{{ $item->date}}</td>
                <td>{{ $item->judul}}</td>
                <td><img style="width:150px;" src="{{ $item->foto }}" alt=""></td>
                <td>{{ $item->status == '0' ? 'menunggu verifikasi': $item->status}}</td>
                <td>{{ $item->tanggapan->date ?? '-'}}</td>
                <td>{{ $item->tanggapan->petugas->name ?? '-'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<section class="mt-5" id="deskripsi">
    <div class="h2 fw-bold text-primary">Pengaduan Masyarakat Kecamatan Megamendung</div>
    <hr>
    <p class="informasi">
        Ini adalah wadah digital Pengaduan & Aspirasi masyarakat kecamatan Megamendung.kami menjalankan prosedur yang solutif,jujur dan transparan untuk menjadikan kecamatan Megamendung yang lebih maju dan unggul.
    </p>
</section>

<section class="my-5" id="prosedur">
    <div class="h2 fw-bold text-primary">Prosedur Pengaduan</div>
    <hr>
    <div class="row">
        <div class="col-3">
            <div class="card shadow bg-warrning card-body text-white">
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="h4 ">Register & Login</div>
                </div>
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="">Masukan data diri dan desa tempat tinggal kemudian login</div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow bg-warning text-white card-body">
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="h4 ">Buat laporan pengaduan</div>
                </div>
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="">Buat laporan pengaduan dengan memasukan foto, isi laporan, kategory pengaduan dan desa tujuan pengaduan</div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow bg-success text-white card-body">
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="h4 ">Menunggu Verifikasi</div>
                </div>
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="">Menunggu laporan ditanggapi oleh petugas sesuai desa tujuan pengaduan</div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card shadow bg-primary text-white card-body">
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="h4 ">laporan diverifikasi</div>
                </div>
                <div class="d-flex justify-content-center text-center align-center">
                    <div class="">laporan ditanggapi oleh petugas sesuai desa tujuan pengaduan</div>
                </div>
            </div>
        </div>

        <span class="mt-2">Mudah bukan?Mari buat laporan dan aspirasi anda untuk masyarakat yang lebih maju</span>
    </div>
    <div class="d-flex">
        <a href="{{ route('masyarakat.pengaduan.index')}}" class="btn fw-bold tn-block btn-primary">Buat laporan anda sekarang!!</a>
    </div>
</section>

@endsection