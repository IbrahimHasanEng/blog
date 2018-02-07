@extends('layouts.app')

@section('title', "- $post->title")

@section('fixed')
<a href="#" id="showDetails" class="btn btn-success" style="top: 305px; position: sticky;"><i class="fa fa-angle-double-right fa-lg"></i></a>
@endsection

@section('content')
  <div class="row">
    <div id="post" class="col-8">
      @if(isset($post->image))
      <img class="img-fluid" src="{{ asset('images/featured/' . $post->image) }}">
      @endif
      <h1 class="mt-4">{{ $post->title }}</h1>
      <hr>
      <div class="lead">{!! $post->body !!}</div>
      <hr>
      <div>
        @foreach($post->tags as $tag)
        <span class="badge badge-dark">{{ $tag->name }}</span>
        @endforeach
      </div>
    </div>
    <div id="postDetails" class="col-4">
      <div class="card" style="top: 100px; position: sticky;">
        <div class="card-body">
            <h5 class="card-title">تفاصيل المقال</h5>
            <hr>
            <h6>الكاتب:</h6>
            <p>ابراهيم حسن</p>

            <h6>القسم:</h6>
            <p>{{ $post->category->name }}</p>
            <h6>تاريخ الإنشاء:</h6>
            <p>{{ Date::parse(strtotime($post->created_at))->format('الساعة H:i من j F، Y') }}</p>
            <h6>تاريخ التعديل:</h6>
            <p>{{ Date::parse(strtotime($post->updated_at))->format('الساعة H:i من j F، Y') }}</p>
          <br>
          <div class="row">
            <div class="col-6">
              {!! Html::linkRoute('blog.index', 'جميع المقالات', array(), array('class' => 'btn btn-secondary btn-block')) !!}
            </div>
            <div class="col-6">
              <a href="#" id="hideDetails" class="btn btn-danger btn-block">إخفاء التفاصيل <i class="fa fa-angle-double-left fa-lg"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')

@endsection
