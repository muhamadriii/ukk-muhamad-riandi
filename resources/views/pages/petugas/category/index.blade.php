@extends('layout.app')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                @if (!isset($data))
                 @include($view.'create')
                @else
                 @include($view.'edit')
                @endif
            </div>
        </div>

        <div class="col-9">
            <div class="d-flex justify-content-between my-3">
                <h4>Master Data Kategory Pengaduan</h4>
                @if (isset($data))
                <a class="btn btn-primary" href="{{ route($route.'index')}}">Create</a>
                @endif
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->name}}</td>
                            <td>
                                <form action="{{ route($route.'destroy',$item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <div class="d-flex">
                                    <a href="{{ route($route.'edit', $item->id)}}" class="btn btn-primary m-1">Edit</a>
                                    <button class="btn btn-danger m-1">delete</button>
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