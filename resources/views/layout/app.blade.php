<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengaduan Masyarakat | Kec.Megamendung</title>
    <link rel="stylesheet" href="{{ asset('app.css')}}">
    <style>
      .nav-link{
        font-weight: bold;
      }
      .bg-body-warning{
        background-color: lightseagreen
      }
    </style>
    @stack('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-warning">
        <div class="container-fluid d-flex justify-content-between">

          <div class="d-flex">
            <a class="navbar-brand" href="#" style="font-weight: bolder">Pengaduan Megamendung</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  {{-- <a class="nav-link active" aria-current="page" href="#">Home</a> --}}
                </li>
                @auth('petugas')
                @if (auth()->guard('petugas')->user()->level == 'admin')
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('petugas.masyarakat.index')}}">masyarakat</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('petugas.petugas.index')}}">petugas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('petugas.village.index')}}">desa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('petugas.category.index')}}">kategori</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('petugas.pengaduan.index')}}">Pengaduan</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('petugas.pengaduan.index')}}">Pengaduan</a>
                  </li>
                @endif
                @endauth

              </ul>
            </div>
          </div>
          @auth
          <div class="">
            <form class="d-flex" action="{{ route('logout')}}" method="post">
              @csrf
              @if (auth()->guard('petugas')->user())
              <h5>Hi {{ str()->limit(auth()->guard('petugas')->user()->name, 7) }}</h5>
              @else
              <h5>Hi {{ str()->limit(auth()->guard('masyarakat')->user()->name, 7) }}</h5>
              @endif
              <button type="submit" class="ms-2 btn btn-danger">Logout</button>
            </form>
          </div>
          @endauth
          @guest
          <div class="">
              <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
          </div>
          @endguest
        </div>
    </nav>

    <div class="container-fluid my-3">
        @yield('content')
    </div>
    <script src="{{ asset('app.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}
</body>
</html>