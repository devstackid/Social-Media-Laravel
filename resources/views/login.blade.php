<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body class="bg-dark">
    <div class="wrapper container-fluid">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-lg-3 col-11 text-center" style="font-size: 14px;">
                @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if (session()->has('loginError'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
                <h3 class="fw-bold text-light">Login</h3>
                <small><p class="text-light mb-4 mt-3" style="font-size:12px;">Harap masuk untuk melanjutkan</p></small>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating mb-2">
                    <input type="text" class="text-primary fw-bold form-control border-primary border-2 @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" autofocus required value="{{ old('username') }}" autocomplete="off" style="background-color: inherit; font-size:12px;">
                    <label for="username" style="font-size: 12px; color:white;">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" class="text-primary fw-bold border-primary border-2 form-control @error('password') is-invalid @enderror" style="background-color: inherit; font-size:12px;" name="password" id="password" placeholder="password" required>
                    <label for="password" style="font-size: 12px; color:white;">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="text-center text-light mt-4 mb-2">
                    <small>belum punya akun? <a href="/register">Daftar</a></small>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
            </form>
            </div>
        </div>
        <div class="text-center">
          <small>Copyright - 2023, @dyyynn_</small>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
