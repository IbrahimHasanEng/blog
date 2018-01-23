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
      <p class="lead">{{ $post->body }}</p>
    </div>
    <div class="col-4">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">تفاصيل المقال</h5>
          <dl class="row">
            <dt class="col-6">تاريخ الإنشاء:</dt>
            <dd class="col-6">{{ Date::parse(strtotime($post->created_at))->format('j F، Y الساعة H:i') }}</dd>
          </dl>
          <dl class="row">
            <dt class="col-6">تاريخ التعديل:</dt>
            <dd class="col-6">{{ Date::parse(strtotime($post->updated_at))->format('j F، Y الساعة H:i') }}</dd>
          </dl>
          <hr>
          <div class="row">
            <div class="col-6">
              {!! Html::linkRoute('posts.edit', 'تعديل', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
            </div>
            <div class="col-6">
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
              {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-block']) !!}
              {!! Form::close() !!}
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
