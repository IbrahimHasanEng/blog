@extends('main')

@section('title', '- مقال جديد')

@section('styles')
  {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

<h1>مقال جديد</h1>
<hr>
{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '')) !!}

  {{ Form::label('title', 'عنوان المقال:') }}
  {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'اكتب عنوان المقال هنا')) }}
<br>
  {{ Form::label('body', 'محتوى المقال:') }}
  {{ Form::textarea('body', null, array('class' => 'form-control', 'placeholder' => 'اكتب المقال هنا')) }}
<br>
  {{ Form::submit('انشر المقال', array('class' => 'btn btn-primary btn-block')) }}

{!! Form::close() !!}
<br>
@include('partials._messages')
@endsection

@section('scripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/parsley-lang/ar.js') !!}
@endsection
