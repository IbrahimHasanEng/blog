@extends('layouts.app')

@section('title', '- عرض المقال')

@section('content')
  <div class="row">
    <div class="col-8">
      <h1>{{ $post->title }}</h1>
      <hr>
      <div class="lead">{!! $post->body !!}</div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">تفاصيل المقال</h5>
          <hr>
            <h6>رابط المقال:</h6>
            <p dir="ltr"><a href="{{ route('blog.single', $post->id) }}">{{ route('blog.single', $post->id) }}</a></p>
            <h6>الكاتب:</h6>
            <p>ابراهيم حسن</p>

            <h6>التصنيف:</h6>
            <p>{{ $post->category->name }}</p>

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
              {!! Html::linkRoute('posts.index', 'عرض جدول المقالات', array(), array('class' => 'btn btn-secondary btn-block')) !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
