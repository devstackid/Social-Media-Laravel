@extends('layouts.main')


@section('posts')

  <div class="container-fluid overflow-y-auto wrapperPostingan mt-4" style="height: 90vh; width:100%;">
  @foreach($posts as $post)
  <div class="rounded-top border-0 d-flex mb-4">
    <div class="me-2">
        @if ($post->user->image)
        <div class="shadow" style="width: 40px; height:40px; border-radius:50%; overflow:hidden;">
          <img src="{{ asset('storage/' . $post->user->image) }}" alt="gambar" style="width: 40px">
        </div>
        @else
          <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ class="rounded-circle shadow bg-white" style="width: 40px">
        @endif
    </div>
    <div>
        
        <p style="font-size: 12px"><a href="/account/{{ $post->user->id }}" class="text-decoration-none text-warning">{{ $post->user->username }}</a> <small class="ms-2 text-secondary">{{ $post->created_at->diffForHumans() }}</small></p>
        
        <img src="{{ $post->image }}" alt="wahyu" class="card-img mb-3">
        
        
        <p class="text-light fw-light" style="font-size: 12px"><a href="" class="text-decoration-none text-light fw-bold">{{ $post->user->username }}</a> <span>{{ $post->caption }}</span></p>
        
        
            <form action="/home/{{ $post->id }}" method="post">
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <input type="hidden" name="parent" value="0">
              <div class="d-flex w-100 align-items-center">
                <div class="me-2" style="width:30px; height:30px; border-radius:50%; overflow:hidden;">
              <img src="{{ auth()->user()->image }}" style="width: 30px" alt=""/>  
            </div>
              <input type="text" class="text-light border-0 mt-3 mb-2" name="komentar" id="komentar" placeholder="Tulis Komentar" autocomplete="off" autofocus style="outline: none; font-size:12px; width:80%; background-color:inherit;" required>
              <button type="submit" class="badge border-0 text-primary fw-bold" style="background-color: inherit">Kirim</button> 
            </div>
            </form>

            @if($post->comments_count)
            <a href="/detail/{{ $post->id }}" class="text-secondary text-decoration-none" style="font-size: 12px">Lihat {{ $post->comments_count }} Komentar </a>
            @else
            <p class="text-secondary mt-1" style="font-size: 12px">Belum Ada Komentar</p>
            @endif
           
          
    </div>
</div>
@endforeach
</div>

@endsection

