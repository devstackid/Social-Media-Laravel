@extends('../layouts.main')

@section('posts')
<div class="text-light w-100 py-2 ps-3 rounded-top"><small class="fw-bold" style="font-size: 12px">Edit Profile</small></div>
<div class="container-fluid overflow-y-auto wrapperPostingan" style="height: 90vh; width:100%;">
  @if (auth()->user()->image)
        <div style="width:70px; height:70px; border-radius:70px; overflow:hidden;">
          <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="gambar" style="width: 70px;">
        </div>
      @else
      <div class="shadow bg-light" style="width:70px; height:70px; border-radius:70px; overflow:hidden;">
          <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ style="width: 70px;">
        </div>
      @endif
      <div class="mt-2">
        <form method="post" action="{{ route('users.update') }}" enctype="multipart/form-data">
          
          @method('put')
          @csrf
          <label for="image" class="form-label mb-2 text-secondary"><span class="btn btn-sm border-0 btn-outline-info">Ubah Foto</span></label>
          
          <div class="mt-2">
                <img class="img-preview" style="width: 100px">
          </div>
          <input type="file" class="@error('image') is-invalid @enderror" name="image" id="image" style="display: none" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
        <div class="form-floating text-light mb-2">
          <input type="text" class="form-control text-light border-0 @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ old('nama', Auth::user()->nama) }}" style="font-size:12px; background-color:inherit;">
          <label for="nama" class="text-secondary">Nama</label>
          @error('nama')
            <div class="invalid-feedback text-warning" style="font-size: 12px">
                {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-floating text-light mb-2">
          <input type="text" class="form-control text-light border-0 @error('username') is-invalid @enderror" id="username" name="username" required placeholder="Username" value="{{ old('username', Auth::user()->username) }}" style="outline: none; font-size:12px; background-color:inherit;">
          <label for="username" class="text-secondary">Username</label>
          @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-floating text-light mb-2">
          <input type="text" class="form-control text-light border-0 @error('bio') is-invalid @enderror" id="bio" name="bio" placeholder="Bio" value="{{ old('bio', Auth::user()->bio) }}" autocomplete="off" style="outline: none; font-size:12px; background-color:inherit;">
          <label for="bio" class="text-secondary">Bio</label>
            @error('bio')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
          @enderror
        </div>
          <div class="text-end">
            <a href="/home" class="btn btn-sm btn-outline-light">Batal</a>
        <button type="submit" class="btn btn-sm btn-outline-info">Ubah profil</button>
      </div>
    </form>
      </div>
      <hr class="text-secondary">

    
      <div class="row">
        <p style="font-size: 12px" class="mb-3 text-light text-center">Hapus Postingan</p>
        @foreach ($postingan as $post)
                <div class="col-4 mb-3">
                    <div class="card bg-dark text-light rounded-0 shadow-lg position-relative">
                        <img src="/{{ $post->image }}" class="card-img rounded-0" alt="">
                        <form action="/post/{{ $post->id }}" method="post" class="position-absolute">
                        @method('delete')
                        @csrf
                        <div  class="position-absolute start-0 top-0">
                        <button type="submit" class="btn btn-warning shadow border-0 rounded-0" >
                          <i class="bi bi-trash"></i>
                        </button>
                      </div>
                        </form>
                    </div>
                </div>
        @endforeach
      </div>
</div>
{{-- <div class="modal modal-sm fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content rounded-3 shadow">
      <div class="modal-body p-4 text-center text-dark">
        <h5 class="mb-3">Hapus Postingan?</h5>
        <p class="mb-0">Postingan akan dihapus secara permanen. </p>
      </div>
      <div class="modal-footer flex-nowrap p-0">
        <button type="submit" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Hapus</strong></button>
        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">batal</button>
      </div>
    </div>
  </form>
  </div>
</div> --}}
@endsection


