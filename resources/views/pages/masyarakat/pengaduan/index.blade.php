@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                @if (!isset($data))
                    @include($view.'create')
                @else
                    @if ($data->status == 0)
                        @include($view.'edit')
                    @else
                        @include($view.'show')
                    @endif
                @endif
            </div>
        </div>

        <div class="col-9">
            <div class="d-flex justify-content-between my-3">
                <h4>Data Pengaduan</h4>
                @if (!isset($data) && auth()->guard('masyarakat')->check())
                <form class="d-flex" action="{{ route($route.'index')}}" method="get">

                    <div class="m-1">
                        <label for="strdate">Pengaduan dari tanggal</label><br>
                        <input type="date" name="strdate" id="strdate" value="{{ $request->strdate ?? ''}}">
                    </div>
                    
                    <div class="m-1">
                        <label for="enddate">Pengaduan sampai tanggal</label><br>
                        <input type="date" name="enddate" id="enddate" value="">
                    </div>

                    <div class="m-1">
                        <label for="village">Desa </label><br>
                        <select name="village" id="village" aria-placeholder="village">
                            <option value="all">all</option>
                            @foreach ($village as $item)
                                <option value="{{$item->id}}"  {{ request()->village == $item->id ? 'selected':'' }} >{{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-1">
                        <label for="category">Kategori</label><br>
                        <select name="category" id="category" aria-placeholder="category">
                            <option value="all">all</option>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}" {{ request()->category == $item->id ? 'selected':'' }} >{{ $item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="m-1">
                        <label for="status">Status</label><br>
                        <select name="status" id="status" aria-placeholder="status">
                            <option value="all">all</option>
                            <option value="0" {{ request()->status == '0' ? 'selected':'' }} >need perivication</option>
                            <option value="proses" {{ request()->status == 'proses' ? 'selected':'' }} >proses</option>
                            <option value="selesai" {{ request()->status == 'selesai' ? 'selected':'' }} >selesai</option>
                        </select>
                    </div>

                    <div class="">
                        <button class="btn me-1 mt-4 btn-primary">Filter</button>
                    </div>
                    @if ( count($datas) > 0)
                    <div class="">
                        <a href="{{ request()->category ? $url.'&pdf=true' : '?pdf=true'}}" class="btn mt-4 btn-warning">Print</a>
                    </div>
                    @endif
                </form>
                @endif
                @if (isset($data) && auth()->guard('masyarakat')->check())
                <a class="btn btn-primary" href="{{ route($route.'index')}}">Buat Pengaduan</a>
                @endif
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tujuan</th>
                            <th>Kategory</th>
                            <th>Pelapor</th>
                            <th>Tanggal</th>
                            <th>Judul</th>
                            <th>Foto</th>
                            <th>Status</th>
                            <th>Action</th>
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
                            <td>
                                <form action="{{ route($route.'destroy',$item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <div class="d-flex">
                                    @if ($item->status == '0')  
                                    <a href="{{ route($route.'edit', $item->id)}}" class="btn btn-primary m-1">Edit</a>
                                    @else
                                    <a href="{{ route($route.'edit', $item->id)}}" class="btn btn-primary m-1">Lihat</a>
                                    @endif

                                    @if ($item->status != 'selesai' && $item->status != 'proses')  
                                    <button class="btn btn-danger m-1">delete</button>
                                    @endif
                                </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection