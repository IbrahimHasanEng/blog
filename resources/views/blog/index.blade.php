@extends('main')

@section('title', "- جميع المقالات")

@section('content')

<div class="container">
  <div class="row d-flex align-items-stretch flex-wrap">
    @foreach($posts as $post)
      <div class="col-4 mb-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">ابراهيم حسن</h6>
            <hr>
            <p class="card-text">{!! mb_substr($post->body, 0, 200) !!}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
            <hr>
            <div>
              <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary btn-sm">اقرأ المزيد</a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
