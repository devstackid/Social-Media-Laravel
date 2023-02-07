@extends('layouts.main')


@section('posts')

  <div class="container-fluid overflow-y-auto wrapperPostingan mt-4" style="height: 90vh; width:100%;">
  
  <div class="rounded-top border-0 d-flex justify-content-center">
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
        <p class="" style="font-size: 12px"><a href="/account/{{ $post->user->id }}" class="text-decoration-none text-warning">{{ $post->user->username }}</a><small class="ms-2 text-secondary">{{ $post->created_at->diffForHumans() }}</small></p>
        <img src="/{{ $post->image }}" alt="wahyu" class="card-img mb-3">
        
        <small class="text-light fw-light" style="font-size: 12px"><a href="/account/{{ $post->user->id }}" class="text-decoration-none text-light fw-bold">{{ $post->user->username }}</a> <span>{{ $post->caption }}</span></small>
            <form action="/home/{{ $post->id }}" method="post">
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <input type="hidden" name="parent" value="0">
              <div class="d-flex w-100 align-items-center">
                <div class="me-2" style="width:30px; height:30px; border-radius:50%; overflow:hidden;">
                    <img src="/{{ auth()->user()->image }}" style="width: 30px" alt="">  
                  </div>
              <input type="text" class="text-light border-0 mt-3 mb-2" name="komentar" id="komentar" placeholder="Tulis Komentar" autocomplete="off" autofocus style="outline: none; font-size:12px; width:80%; background-color:inherit;" required>
              <button type="submit" class="badge border-0 text-info fw-bold" style="background-color: inherit">Kirim</button> 
            </div>
              <p class="text-decoration-underline mt-2" style="font-size: 12px">Komentar </p>
            </form>
        <div>
        @foreach($comments as $comment)
          <div class="d-flex mb-1 mt-2">
            <div class="">
              @if ($comment->user->image)
              <div class="shadow" style="width: 40px; height:40px; border-radius:50%; overflow:hidden;">
                  <img src="{{ asset('storage/' . $comment->user->image) }}" alt="gambar" style="width: 40px">
              </div>
              @else
                  <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ class="rounded-circle shadow bg-white" style="width: 40px">
              @endif
            </div>
            <div class="ms-2 mb-1">
                <p style="font-size: 12px">{{ $comment->user->username }} <span class="ms-2 text-secondary" style="font-size: 10px">{{ $comment->created_at->diffForHumans() }}</span></p>
                <div class="bg-info rounded-end rounded-bottom pt-2 pb-1 w-100 ps-2 mb-1 me-2">
                    <p class="text-start text-dark fw-bold" style="font-size: 12px">{{ $comment->komentar }}</p>
                </div>
                <div>
                    <form action="/home/{{ $comment->id }}" method="post">
                      @csrf
                          <input type="hidden" name="post_id" value="{{ $post->id }}">
                          <input type="hidden" name="parent" value="{{ $comment->id }}">
                          <div class="d-flex justify-content-between">
                          <input type="text" name="komentar" id="komentar" class="w-100 mb-1 text-light border-0 " placeholder="Balas" autocomplete="off" style="outline: none; font-size:12px; background-color:inherit;" required>
                          <button type="submit" class="badge border-0 text-info" style="background-color: inherit">Balas</button>
                        </div>
                    </form>
                </div>
            </div>
              
          </div>
              
            @foreach($comment->childs()->orderBy('created_at', 'desc')->get() as $child)
                  <div class="d-flex ms-5 bg-light text-dark rounded pt-2 ps-2 mb-1">
                    <div>
                      @if ($child->user->image)
                      <div class="shadow" style="width: 40px; height:40px; border-radius:50%; overflow:hidden;">
                          <img src="{{ asset('storage/' . $child->user->image) }}" alt="gambar" style="width: 40px">
                      </div>
                          @else
                          <img src="https://img.icons8.com/material/100/null/cat-profile.png"/ class="rounded-circle shadow bg-white" style="width: 40px">
                          
                          @endif
                        </div>
                        <div class="ms-2">
                          <p class="text-primary" style="font-size: 12px">{{ $child->user->username }} <span class="ms-2 text-dark" style="font-size: 10px">{{ $child->created_at->diffForHumans() }}</span></p>
                        <p class="text-start text-dark fw-bold rounded-bottom rounded-end" style="font-size: 12px">{{ $child->komentar }}</p>
                        </div>
                    </div>
                  @endforeach
          @endforeach
        </div>
</div>
</div>

</div>

@endsection


