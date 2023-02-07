@extends('layouts.main')

@section('posts')
<div class="container ">
<form action="/explore">
    <div class="row my-2">
        <div class="col-12 justify-content-center d-flex">
            <button type="button" class="btn btn-outline-light border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-arrow-left"></i></button>
            <input type="text" class="text-light border-0 w-75 border-bottom border-light" name="search" id="search" placeholder="Cari.." autocomplete="off" autofocus style="outline: none; font-size:12px; background-color:inherit;" value="{{ request('search') }}">
            <button type="submit" class="badge border-0 text-light fw-bold" style="background-color: inherit">Cari</button>
        </div>
    </div>
</form>
    <div class="row">
        <div class="col-8">
            <div class="mt-2 overflow-y-auto" style="height: 85%;">
            
                @if($accounts->count())
                
                <div class="list-group rounded-0">
                    <a href="/account/{{ $accounts[0]->id }}" class="list-group-item border-0 text-light bg-warning">
                      <div class="d-flex w-100 align-items-center">
                          @if ($accounts[0]->image)
                          <div class="me-2 shadow border border-light border-2" style="width:30px; height:30px; border-radius: 50%; overflow:hidden;">
                            <img src="{{ asset('storage/' . $accounts[0]->image) }}" alt="gambar"  style="width: 30px">
                          </div>
                          @else
                            <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ class="rounded-circle bg-warning shadow me-2" style="width: 30px">
                          @endif
                          <small style="font-size: 10px;">{{ $accounts[0]->username }}</small>
                      </div>
                    </a>
                  </div>
                  <div class="text-light py-2 ps-3 rounded-top"><small class="fw-bold" style="font-size: 12px">Semua Pengguna</small></div>
                  @foreach ($users->skip(1) as $user)
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
                  
                  @else
                  <div class="text-center" style="font-size:12px;">
                    <p>Pengguna Tidak Ditemukan!</p>
                    <img src="asset/not.png" alt="" class="w-25">
                  </div>
                  @endif
                  
            </div>
        </div>
        
        @foreach($posts as $post)
        <div class="col-4 border border-dark p-0">
            <a href="/detail/{{ $post->id }}">
                <div class="ratio ratio-1x1">
                    <img src="{{ $post->image }}" alt="" class="">
                </div>
            </a>
        </div>
        @endforeach
    </div>
    
</div>

@endsection