@extends('layouts.app')

@section('title', "- جميع المقالات")

@section('content')

  <div class="row d-flex align-items-stretch flex-wrap">
    @foreach($posts as $post)
      <div class="col-4 mb-4">
        <div class="card h-100">
          @if(isset($post->image))
          <img class="card-img-top" src="{{ asset('images/featured/' . $post->image) }}" alt="Card image cap">
          @endif
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <small>{{ Date::parse(strtotime($post->created_at))->format('j F، Y') }}</small>
              <h5 class="card-title">{{ $post->title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">ابراهيم حسن</h6>
              <hr>
            </div>
            @if(isset($post->image))
            <p class="card-text">{!! str_limit(strip_tags($post->body), 70, '...') !!}</p>
            @else
            <p class="card-text">{!! str_limit(strip_tags($post->body), 400, '...') !!}</p>
            @endif
            <div>
              <hr>
              <a href="{{ route('blog.single', $post->id) }}" class="btn btn-primary btn-sm">اقرأ المزيد</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="d-flex justify-content-center">
    {!! $posts->links(); !!}
  </div>

@endsection
