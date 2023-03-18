<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('app.css')}}">
</head>
<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-6">
            <div class="card">
                <h4 class="card-header">Register</h4>
                <div class="card-body">
                    <form action="{{ route('masyarakat.register')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="village_id" class="form-label">Tempat tinggal</label>
                          <select class="form-control" id="village_id" name="village_id" aria-describedby="village_idHelp">
                              @foreach ($village as $item)
                                  <option value="{{$item->id}}">{{ 'desa '.$item->name}}</option>
                              @endforeach
                          </select>
                          @if($errors->any())
                            <div class="text-danger">
                              {{ $errors->first('village_id') }}
                            </div>
                          @endif

                        </div>
                    
                        <div class="mb-3">
                          <label for="nik" class="form-label">Nik</label>
                          <input required type="number" class="form-control" value="{{ old('nik')}}" id="nik" name="nik" aria-describedby="nikHelp">
                        </div>
                        @if($errors->any())
                          <div class="text-danger">
                            {{ $errors->first('nik') }}
                          </div>
                        @endif
                        
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input required type="text" class="form-control" value="{{ old('name')}}" id="name" name="name" aria-describedby="nameHelp">
                        </div>                        
                        @if($errors->any())
                          <div class="text-danger">
                            {{ $errors->first('name') }}
                          </div>
                        @endif
                        
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input required type="text" class="form-control" value="{{ old('username')}}" id="username" name="username" aria-describedby="usernameHelp">
                        </div>
                        @if($errors->any())
                          <div class="text-danger">
                            {{ $errors->first('username') }}
                          </div>
                        @endif
                        
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input required type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
                        </div>
                        @if($errors->any())
                          <div class="text-danger">
                            {{ $errors->first('password') }}
                          </div>
                        @endif
                        
                        <div class="mb-3">
                          <label for="telp" class="form-label">Nomor telepon</label>
                          <input required type="number" class="form-control" value="{{ old('telp')}}" id="telp" name="telp" aria-describedby="telpHelp">
                        </div>
                        @if($errors->any())
                          <div class="text-danger">
                            {{ $errors->first('telp') }}
                          </div>
                        @endif
                        
                        <div class="d-flex justify-content-between">
                            <div class="">
                                Sudah memiliki akun?
                                <a href="{{ Route('login')}}">Login disini!</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('app.js')}}"></script>

</body>
</html>