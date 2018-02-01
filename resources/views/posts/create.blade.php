@extends('layouts.app')

@section('title', '- مقال جديد')

@section('content')

<h1>مقال جديد</h1>
<hr>
{!! Form::open(array('route' => 'posts.store')) !!}
<div class="form-group">
  {{ Form::label('title', 'عنوان المقال:') }}
  {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'اكتب عنوان المقال هنا')) }}
  @if ($errors->has('title'))
      <div class="text-danger">
          <strong>{{ $errors->first('title') }}</strong>
      </div>
  @endif
</div>
<div class="form-group">
  {{ Form::label('category_id', ':فئة المقال') }}
  <select class="custom-select" name="category_id">
      @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
  </select>
  @if ($errors->has('category_id'))
      <div class="text-danger">
          <strong>{{ $errors->first('category_id') }}</strong>
      </div>
  @endif
</div>
<div class="form-group">
  {{ Form::label('body', 'محتوى المقال:') }}
  {{ Form::textarea('body', null, array('id' => 'create_post', 'class' => 'form-control', 'placeholder' => 'اكتب المقال هنا')) }}
  @if ($errors->has('body'))
      <div class="text-danger">
          <strong>{{ $errors->first('body') }}</strong>
      </div>
  @endif
</div>
  {{ Form::submit('انشر المقال', array('class' => 'btn btn-primary btn-block')) }}
{!! Form::close() !!}
<br>
@endsection

@section('scripts')
  {!! Html::script('vendor/ckeditor/ckeditor.js') !!}
  <script>
      CKEDITOR.replace('create_post', {
        language: 'ar'
      });
  </script>
@endsection
