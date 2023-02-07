<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BetaApps | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body>
    
    <div class="container-fluid p-0 bg-black" style="height: 100vh; overflow:hidden;">
      <div class="row d-flex text-light">
        {{-- navbar --}}
        <div class="col-sm-1 py-3 jancoy ps-4 shadow">
          <div class="text-center py-3 rounded position-relative" style=" height:95vh;">
            <div>
                <a href="/home" class="btn btn-warning border-0 shadow mb-1 text-light"><i class="bi bi-house"></i></a>
            </div>

            <div>
              <a href="/explore" class="btn btn-outline-warning border-0 shadow mb-1"><i class="bi bi-search"></i></a>
            </div>

            <div>
              <button class="btn btn-outline-warning border-0 shadow mb-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-camera"></i></button>
            </div>
            
            <div>
              <button class="btn btn-outline-warning border-0 shadow mb-1 d-none" id="show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="bi bi-person"></i></span>
              </button>
            </div>

            <div>
              <a href="/notification" class="btn btn-outline-warning border-0 shadow mb-1"><i class="bi bi-heart"></i></a>
            </div>

            <div>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-outline-warning border-0 shadow"><i class="bi bi-box-arrow-right"></i></button>
              </form>
            </div>

            
            @if (auth()->user()->image)
              <div class="position-absolute bottom-0 border border-2 border-light mb-2 ms-3" style="width: 40px; height:40px; border-radius:50%; overflow:hidden;">
                  <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="gambar" style="width: 40px;">
                  
                </div>
                  @else
                  <div class="position-absolute bottom-0 border border-2 border-light" style="width: 40px; height:40px; border-radius:50%; overflow:hidden;">
                  <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ style="width: 40px;">
                  </div>
                  @endif
          </div>
        </div>

        <div class="col-3 rounded accountColumn mt-2 py-5 px-4" style="height:97vh;">
          <div class="text-light w-100 py-2 ps-3 rounded-top"><small class="fw-bold" style="font-size: 12px">Members</small></div>
          <div class="shadow-lg bg-dark rounded mb-4 py-2" style="height: 200px; overflow-y:auto;">
          @foreach($users as $user)
            <div class="list-group rounded-0">
              <a href="/account/{{ $user->id }}" class="list-group-item border-0 text-light" style="background-color: inherit;">
                <div class="d-flex w-100 align-items-center">
                    @if ($user->image)
                    <div class="me-2 shadow border border-light border-2" style="width:30px; height:30px; border-radius: 50%; overflow:hidden;">
                      <img src="{{ asset('storage/' . $user->image) }}" alt="gambar"  style="width: 30px">
                    </div>
                    @else
                      <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ class="rounded-circle bg-warning shadow me-2" style="width: 30px">
                    @endif
                    <small style="font-size: 10px;">{{ $user->username }}</small>
                </div>
              </a>
            </div>
          @endforeach
          </div>

          <div class="text-light w-100 py-2 ps-3 rounded-top fw-bold"><small style="font-size: 12px">Pesan(2)</small></div>
          <div class="border-0 bg-dark rounded py-2 shadow-lg d-flex flex-column align-items-center justify-content-center" style="height: 300px; overflow-y:auto;">
            <p class="text-warning" style="font-size: 12px;">Maaf, fitur chat belum tersedia!</p>
            <img src="/asset/fitur.png" class="w-50" alt="">
          </div>
        </div>

        <div class="col-sm-5 wide px-2">
        @yield('posts')
      </div>

      <nav class="atas navbar fixed-top bg-black d-none">
        <div class="container-fluid d-flex text-light">
          BetasApps
          <a href="/chat" class="btn btn-outline-info border-0 shadow"><i class="bi bi-send"></i></a>
      </nav>

      <nav class="bawah navbar fixed-bottom bg-black shadow pb-4 d-none">
        <div class="container-fluid d-flex">
          <a href="/home" class="btn btn-outline-light border-0"><i class="bi bi-house"></i></a>
          <a href="/explore" class="btn btn-outline-light border-0"><i class="bi bi-search"></i></a>

          <button class="btn btn-outline-light border-0 " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-camera"></i></button>
              
          <a href="/notification" class="btn btn-outline-light border-0"><i class="bi bi-heart"></i></a>
            
          <button class="btn btn-outline-light border-0 d-none" id="show" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation">
              <span><i class="bi bi-person"></i></span>
          </button>
        </div>
      </nav>

        <div class="col-md-3 profileColumn shadow overflow-x-auto mt-2 rounded py-3 px-2" style="height:97vh;">
          <div class="text-light shadow rounded mb-4 w-100 py-2 ps-3 rounded-top fw-bold">
            <small style="font-size: 12px">{{ auth()->user()->username }}</small>
          </div>

          <div class="d-flex me-2">
            @if (auth()->user()->image)
                <div class="shadow border border-2 border-light" style="width: 70px; height:70px; border-radius:50%; overflow:hidden;">
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="gambar" style="width: 70px;">
              </div>
                @else
                <div class="shadow bg-light" style="width: 70px; height:70px; border-radius:50%; overflow:hidden;">
                <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ style="width: 70px;">
                </div>
                @endif
            <div class="d-flex mt-2 ms-4">
              <div class="me-2 text-center">
                <small style="font-size: 10px">Postingan
                  @if(auth()->user()->posts->count(0))
                    <p class="text-secondary">{{ auth()->user()->posts->count() }}</p>
                    @else
                    <p class="text-secondary mt-1">0</p>
                  @endif
                </small> 
              </div>
              <div class="me-2 text-center">
                <small style="font-size: 10px">Pengikut
                  <p class="text-secondary mt-1">0</p>
                </small>
              </div>
              <div class="me-2 text-center">
                <small style="font-size: 10px">Mengikuti
                  <p class="text-secondary mt-1">0</p>
                </small>
              </div>
            </div>  
          </div>
          <div class="py-2 px-2 shadow rounded w-100 my-3">
            <small style="font-size: 10px">
              {{ auth()->user()->nama }}
              <p class="text-warning">@ {{ auth()->user()->username }}</p>
              <p class=""><i>{{ auth()->user()->bio }}</i></p>
            </small>
          </div>

          <div class="text-center">
            <a href="{{ route('users.edit') }}" class="btn w-50 btn-sm text-light rounded px-2 py-1 border-0">Edit Profil</a>
          </div>

          
          <div class="container px-3 pb-2 pt-3 mx-auto overflow-y-auto overflow-x-hidden shadow-lg rounded" style="height: 430px;">
            <div class="row mb-1">
              @foreach($postingan as $post)
              <div class="col-4 p-0">
                <a href="/detail/{{ $post->id }}">
                  <div class="ratio ratio-1x1">
                  <img src="/{{ $post->image }}" class="card-img border-0" alt="...">
                </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
          
        </div>
      </div>
    </div>
    
    
    

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header bg-dark shadow">
    <small class="offcanvas-title text-info fw-bold" id="offcanvasRightLabel">{{ auth()->user()->username }}</small>
    
  </div>
  <div class="offcanvas-body bg-dark text-light position-relative">
    <div class="d-flex">
      @if (auth()->user()->image)
      <div class="mb-2 shadow" style="width:70px; height:70px; border-radius:50%; overflow:hidden;">
          <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="gambar" class="" style="width: 70px">
        </div>
          @else
          <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ class="rounded-circle bg-white shadow mb-2" style="width: 70px">
          @endif
      <div class="d-flex mt-2 ms-5">
        <div class="me-2 text-center">
          <small style="font-size: 12px">Postingan
            @if(auth()->user()->posts->count(0))
                    <p class="text-secondary">{{ auth()->user()->posts->count() }}</p>
                    @else
                    <p class="text-secondary mt-1">0</p>
                  @endif
          </small> 
        </div>
        <div class="me-2 text-center">
          <small style="font-size: 12px">Pengikut
            <p class="text-secondary">0</p>
          </small>
        </div>
        <div class="me-2 text-center">
          <small style="font-size: 12px">Mengikuti
            <p class="text-secondary">0</p>
          </small>
        </div>
      </div>
    </div>
    <div class="ms-2">
      <small style="font-size: 10px">
        {{ auth()->user()->nama }}
        <p class="text-secondary">@ {{ auth()->user()->username }}</p>
        <p><i>{{ auth()->user()->bio }}</i></p>
      </small>
    </div>

    <div class="text-center">
      <a href="{{ route('users.edit') }}" class="btn btn-outline-info w-50 btn-sm rounded px-2 py-1 border-0">Edit Profil</a>
    </div>

    <div class="text-dark w-100 py-2 ps-3 rounded-top fw-bold">
      <small style="font-size: 12px">Posts (1)</small>
    </div>
    <div class="container p-0 pt-1 mb-1 overflow-y-auto overflow-x-hidden" style="height: 350px;">
      <div class="row mb-1">
        @foreach($postingan as $post)
        <div class="col-4 p-0 border border-dark">
          <a href="/detail/{{ $post->id }}">
            <div class="ratio ratio-1x1">
            <img src="/{{ $post->image }}" class="card-img border-0" alt="...">
          </div>
        </a>
        </div>
        @endforeach
      </div>
    </div>
    <div class="position-absolute bottom-0 end-0">
    <form action="/logout" method="post">
      @csrf
      <button type="submit" class="btn btn-outline-light border-0 shadow mb-2 me-2">Logout</button>
    </form>
    </div>
  </div>
</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content bg-dark text-light rounded-4 shadow">
              <form action="/post" method="post" enctype="multipart/form-data">
                  @csrf
            <div class="modal-body p-5">
              <h2 class="fw-bold mb-0">Tambah Postingan</h2>
      
              <ul class="d-grid gap-4 my-5 list-unstyled">
                <li class="d-flex gap-4">
                  <div class="text-center">
                    {{-- label --}}
                    <label for="image" class="mb-2"><span class="btn btn-dark"><i class="bi bi-camera-fill" style="cursor: pointer"></i> Tambah Foto</span></label>
                  <img class="img-preview img-fluid">
                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" style="visibility: hidden" onchange="previewImage()">
                  @error('image')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                  </div>
                </li>
                <li class="d-flex gap-4">
                  <div class="col-12 form-floating text-light">
                    {{-- label --}}
                    <input type="text" class="bg-dark text-light form-control pt-5 pb-5 @error('caption') is-invalid @enderror" name="caption" id="caption" placeholder="Caption">
                  <label for="caption">Caption</label>
                  @error('caption')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                  </div>
                </li>
                <li class="d-flex gap-4 justify-content-center">
                  <div>
                      <small>* Ukuran foto maksimal 2Mb ya! Kalo gagal berati ukuran fotonya kegedean.</small>
                  </div>
                </li>
              </ul>
              <button type="submit" class="btn btn-lg btn-primary mt-3 w-100" data-bs-dismiss="modal">Upload</button>
          </form>
          <button type="button" class="btn btn-lg btn-danger mt-1 w-100" data-bs-dismiss="modal">Batal</button>
          </div>
</div>


    <script>

      function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
  
        imgPreview.style.display = 'block';
  
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
  
        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
  
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    

    
  </body>
</html>