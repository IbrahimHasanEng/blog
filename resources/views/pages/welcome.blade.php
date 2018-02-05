@extends('layouts.app')

@section('title', '- الصفحة الرئيسية')

@section('content')
  <h1 class="display-3 my-5 text-primary">أحدث المقالات</h1>
  <div class="row justify-content-between">
    <div class="col-md-8">

    @foreach($posts as $post)

      <div class="post mb-5">
        <h3><span class="badge badge-dark align-top"><small>{{ $post->category->name }}</small></span> {{ $post->title }}</h3>
        <h4><small class="text-secondary">{{ Date::parse(strtotime($post->created_at))->ago() }}</small></h4>
        <div class="my-3">{!! mb_substr(strip_tags($post->body), 0, 300) !!}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</div>
        {!! Html::linkRoute('blog.single', 'تابع القراءة', array($post->id), array('class' => 'btn btn-primary btn-sm')) !!}
        <hr>
        <?php
        
          ?>
      </div>

    @endforeach

    </div><!-- End of Posts Column -->

    <div class="col-md-3 sidebar">
      <h2>Sidebar</h2>
    </div>
  </div><!-- End of Row -->
@endsection
