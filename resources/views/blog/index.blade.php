@extends('main')

@section('title', "- جميع المقالات")

@section('content')

<div class="container">
  <div class="row d-flex align-items-stretch flex-wrap">
    @foreach($posts as $post)
      <div class="col-4 mb-4">
        <div class="card h-100">
          <div class="card-body d-flex flex-column justify-content-between">
            <div>
              <h5 class="card-title">{{ $post->title }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">ابراهيم حسن</h6>
              <hr>
            </div>
            <p class="card-text">{!! mb_substr($post->body, 0, 90) !!}{{ strlen($post->body) > 90 ? "..." : "" }}</p>
            <div>
              <hr>
              <a href="{{ route('blog.single', $post->id) }}" class="btn btn-primary btn-sm">اقرأ المزيد</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
