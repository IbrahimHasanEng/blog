@extends('main')

@section('title', '- عرض المقال')

@section('styles')
  {!! Html::style('css/parsley.css') !!}
@endsection

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
            <p dir="ltr"><a href="{{ url($post->slug) }}">{{ mb_substr(url($post->slug), 0, 30) }}{{ strlen(url($post->slug)) > 30 ? "..." : "" }}</a></p>
            <h6>تاريخ الإنشاء:</h6>
            <p>{{ Date::parse(strtotime($post->created_at))->format('الساعة H:i من j F، Y') }}</p>
            <h6>تاريخ التعديل:</h6>
            <p>{{ Date::parse(strtotime($post->updated_at))->format('الساعة H:i من j F، Y') }}</p>
          <hr>
          <div class="row">
            <div class="col-6">
              {!! Html::linkRoute('posts.edit', 'تعديل', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
            </div>
            <div class="col-6">
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
              {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-block']) !!}
              {!! Form::close() !!}
            </div>
          </div>
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
