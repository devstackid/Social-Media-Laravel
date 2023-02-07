@extends('layouts.main')

@section('posts')
<div class="container overflow-y-auto" style="height: 95vh;">
    <div class="text-light shadow rounded mb-4 w-100 py-2 ps-3 rounded-top fw-bold">
    <small style="font-size: 12px">{{ $user->username }}</small>
    </div>

  <div class="d-flex ps-3">
    @if ($user->image)
        <div class="shadow border border-2 border-light" style="width: 100px; height:100px; border-radius:50%; overflow:hidden;">
        <img src="{{ asset('storage/' . $user->image) }}" alt="gambar" style="width: 100px;">
      </div>
        @else
        <div class="shadow bg-light" style="width: 100px; height:100px; border-radius:50%; overflow:hidden;">
        <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ style="width: 100px;">
        </div>
        @endif
    <div class="d-flex mt-2 ms-4">
      <div class="me-2 text-center">
        <small style="font-size: 14px">Postingan
          @if($user->posts->count(0))
            <p class="text-light">{{ $user->posts->count() }}</p>
            @else
            <p class="text-light mt-1">0</p>
          @endif
        </small> 
      </div>
      <div class="me-2 text-center">
        <small style="font-size: 14px">Pengikut
          <p class="text-light">0</p>
        </small>
      </div>
      <div class="me-2 text-center">
        <small style="font-size: 14px">Mengikuti
          <p class="text-light">0</p>
        </small>
      </div>
    </div>  
  </div>
  <div class="py-2 px-3 shadow rounded w-100 my-3">
    <small style="font-size: 10px">
      {{ $user->nama }}
      <p class="text-warning">@ {{ $user->username }}</p>
      <p class=""><i>{{ $user->bio }}</i></p>
    </small>
  </div>

  <div class="container px-3 pb-2 pt-3 mx-auto shadow-lg rounded">
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
</div>
@endsection