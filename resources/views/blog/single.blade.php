@extends('layouts.app')

@section('title', "- $post->title")

@section('content')

  <div class="row">
    <div class="col-8">
      <h1 class="mt-4">{{ $post->title }}</h1>
      <hr>
      <div class="lead">{!! $post->body !!}</div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
            <h5 class="card-title">تفاصيل المقال</h5>
            <hr>
            <h6>الكاتب:</h6>
            <p>ابراهيم حسن</p>

            <h6>الفئة:</h6>
            <p>{{ $post->category->name }}</p>
            <h6>تاريخ الإنشاء:</h6>
            <p>{{ Date::parse(strtotime($post->created_at))->format('الساعة H:i من j F، Y') }}</p>
            <h6>تاريخ التعديل:</h6>
            <p>{{ Date::parse(strtotime($post->updated_at))->format('الساعة H:i من j F، Y') }}</p>
          <br>
          <div class="row">
            <div class="col-12">
              {!! Html::linkRoute('blog.index', 'جميع المقالات <<', array(), array('class' => 'btn btn-secondary btn-block')) !!}
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
