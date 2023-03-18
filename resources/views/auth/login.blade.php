<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('app.css')}}">
</head>
<body>
    <div class="row mt-5 justify-content-center">
        <div class="col-6">
            <div class="card">
                <h4 class="card-header">Login</h4>
                <div class="card-body">
                <form action="{{ route('login')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username')}}" aria-describedby="usernameHelp" autofocus>
                    </div>
                    @if($errors->any())
                        <div class="text-danger">
                        {{ $errors->first('username') }}
                        </div>
                    @endif
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"  class="form-control" id="password" name="password" aria-describedby="passwordHelp">
                    </div>
                    @if($errors->any())
                        <div class="text-danger">
                        {{ $errors->first('password') }}
                        </div>
                    @endif
                    
                    <div class="d-flex justify-content-between">
                        <div class="">
                            Belum memiliki akun?
                            <a href="{{ Route('masyarakat.register.view')}}">Register disini</a>
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