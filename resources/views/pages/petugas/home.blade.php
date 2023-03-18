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
    </style>
@endpush

@section('content')
<div class="row">
    <div class="col-8">
        <div class="row">
            
            <div class="col-4">
                <div class="card shadow bg-warrning">
                    <div class="card-body">
                        <span class=" fst-italic">Pengaduan</span>
                        <div class="d-flex mt-4 justify-content-center">
                            <div class="h4 mt-4">Menunggu</div>
                            <div class="count-pengaduan fw-bold">{{ $cardPengaduan['proses'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-4">
                <div class="card shadow bg-primary">
                    <div class="card-body">
                        <span class=" fst-italic">Pengaduan</span>
                        <div class="d-flex mt-4 justify-content-center text-center align-center">
                            <div class="h4 mt-4">Dalam Proses</div>
                            <div class="count-pengaduan fw-bold">{{ $cardPengaduan['proses'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-4">
                <div class="card shadow bg-succes">
                    <div class="card-body">
                        <span class=" fst-italic">Pengaduan</span>
                        <div class="d-flex mt-4 justify-content-center text-center align-center">
                            <div class="h4 mt-4">Selesai</div>
                            <div class="count-pengaduan fw-bold">{{ $cardPengaduan['selesai'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <h3 class="card-header bg-primary-0">Pengaduan terbaru</h3>
            <div class="card-body">

                @foreach ($recentPengaduan as $item)
                <div class="card card-body mb-3 pt-2">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <div class="h5 fw-bold mb-1 text-primary">{{ str()->limit($item->judul, 25)}}</div>
                            <div class="fst-italic">{{ $item->category->name .' | Desa '. $item->village->name}}</div>
                        </div>
                        <div class="">
                            <div class="h5">2023-20-22</div>
                            <a class="link-no-style" href="{{ route('petugas.pengaduan.edit',$item->id)}}" >lihat detail...</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-flex justify-content-end">
                    <a href="{{ route('petugas.pengaduan.index')}}" class="btn btn-sm btn-primary">Lihat selengkapnya..</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection