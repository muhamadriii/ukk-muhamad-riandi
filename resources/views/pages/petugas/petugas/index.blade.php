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
                <h4>Data Petugas</h4>
                @if (isset($data))
                <a class="btn btn-primary" href="{{ route($route.'index')}}">Create</a>
                @endif
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Village</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Telp</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->village->name}}</td>
                            <td>{{ $item->username}}</td>
                            <td>{{ $item->telp}}</td>
                            <td>{{ $item->level}}</td>
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