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
                          <label for="village_id" class="form-label">desa</label>
                          <select class="form-control" id="village_id" name="village_id" aria-describedby="village_idHelp">
                              @foreach ($village as $item)
                                  <option value="{{$item->id}}">{{ 'desa '.$item->name}}</option>
                              @endforeach
                          </select>
                        </div>
                    
                        <div class="mb-3">
                          <label for="nik" class="form-label">nik</label>
                          <input required type="number" class="form-control" id="nik" name="nik" aria-describedby="nikHelp">
                        </div>
                        
                        <div class="mb-3">
                          <label for="name" class="form-label">name</label>
                          <input required type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
                        </div>
                        
                        <div class="mb-3">
                          <label for="username" class="form-label">username</label>
                          <input required type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp">
                        </div>
                        
                        <div class="mb-3">
                          <label for="password" class="form-label">password</label>
                          <input required type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
                        </div>
                        
                        <div class="mb-3">
                          <label for="telp" class="form-label">telp</label>
                          <input required type="number" class="form-control" id="telp" name="telp" aria-describedby="telpHelp">
                        </div>
                        
                        <div class="d-flex justify-content-end">
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