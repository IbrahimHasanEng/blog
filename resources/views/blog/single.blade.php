@extends('main')

@section('title', "- $post->title")

@section('content')

<div class="container">
  <div class="row">
    <div class="col-8">
      <h1>{{ $post->title }}</h1>
      <p class="lead">{!! $post->body !!}</p>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">تفاصيل المقال</h5>
          <hr>
            <h6>رابط المقال:</h6>
            <p dir="ltr"><a href="{{ route('blog.single', $post->slug) }}">{{ mb_substr(route('blog.single', $post->slug), 0, 40) }}{{ strlen(url($post->slug)) > 30 ? "..." : "" }}</a></p>
            <h6>تاريخ الإنشاء:</h6>
            <p>{{ Date::parse(strtotime($post->created_at))->format('الساعة H:i من j F، Y') }}</p>
            <h6>تاريخ التعديل:</h6>
            <p>{{ Date::parse(strtotime($post->updated_at))->format('الساعة H:i من j F، Y') }}</p>
          <br>
          <div class="row">
            <div class="col-12">
              {!! Html::linkRoute('posts.index', 'جميع المقالات <<', array(), array('class' => 'btn btn-secondary btn-block')) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/parsley-lang/ar.js') !!}
@endsection