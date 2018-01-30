@extends('main')

@section('title', '- الصفحة الرئيسية')

@section('carousel')
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" data-src="holder.js/800x300?auto=yes&amp;bg=555&amp;fg=333&amp;text=First slide" alt="Third slide [800x300]" src="images/1.jpg" data-holder-rendered="true">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" data-src="holder.js/800x300?auto=yes&amp;bg=555&amp;fg=333&amp;text=Second slide" alt="Third slide [800x300]" src="images/2.jpg" data-holder-rendered="true">
      </div>
      <div class="carousel-item">
      <img class="d-block w-100" data-src="holder.js/800x300?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x300]" src="images/3.jpg" data-holder-rendered="true">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
@endsection

@section('content')
  <div class="row justify-content-between">
    <div class="col-md-8">

    @foreach($posts as $post)

      <div class="post mb-5">
        <h3>{{ $post->title }}</h3>
        <p class="lead">{!! mb_substr($post->body, 0, 300) !!}{{ strlen($post->body) > 300 ? "..." : "" }}</p>
        {!! Html::linkRoute('blog.single', 'اقرأ المزيد', array($post->id), array('class' => 'btn btn-primary btn-sm')) !!}
        <hr>
      </div>

    @endforeach

    </div><!-- End of Posts Column -->

    <div class="col-md-3 sidebar">
      <h2>Sidebar</h2>
    </div>
  </div><!-- End of Row -->
@endsection
