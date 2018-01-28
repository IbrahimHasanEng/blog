@extends('main')

@section('title', '- الصفحة الرئيسية')

@section('content')
  <div class="jumbotron">
    <h1 class="display-4">أهلاً بكم في موقعنا!</h1>
    <p class="lead">نشكركم على زيارتكم مدونة نور، من فضلكم تابعوا تجوالكم في الموقع.</p>
    <p class="lead">
      <a class="btn btn-primary btn-lg" href="#" role="button">أحدث المقالات</a>
    </p>
  </div>
  <div class="row justify-content-between">
    <div class="col-md-8">

    @foreach($posts as $post)

      <div class="post">
        <h3>{{ $post->title }}</h3>
        <p class="lead">{!! mb_substr($post->body, 0, 300) !!}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
        {!! Html::linkRoute('blog.single', 'اقرأ المزيد', array($post->slug), array('class' => 'btn btn-primary btn-sm')) !!}
      </div>

      <hr>

    @endforeach

    </div><!-- End of Posts Column -->

    <div class="col-md-3 sidebar">
      <h2>Sidebar</h2>
    </div>
  </div><!-- End of Row -->
@endsection
