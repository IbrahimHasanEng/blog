@extends('layouts.app')

@section('title', '- مقال جديد')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')

<h1>مقال جديد</h1>
<hr>
{!! Form::open(array('route' => 'posts.store', 'files' => 'true')) !!}
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
  {{ Form::label('category_id', 'القسم:') }}
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
    {{ Form::label('tags', 'الوسوم:') }}
    <select class="custom-select tags" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('tags'))
        <div class="text-danger">
            <strong>{{ $errors->first('tags') }}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    {{ Form::label('featured_image', 'صورة المقال الرئيسية:') }}
    <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" name="featured_image" id="inputFile">
            <label class="custom-file-label" name="featured_image" for="inputFile">اختر صورة المقال الرئيسية</label>
        </div>
    </div>
    @if ($errors->has('featured_image'))
        <div class="text-danger">
            <strong>{{ $errors->first('featured_image') }}</strong>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.full.min.js"></script>
  <script>
    CKEDITOR.replace('create_post', {
        language: 'ar',
        filebrowserBrowseUrl: "{{asset('vendor/ckeditor/ckfinder/ckfinder.html')}}",
        filebrowserImageBrowseUrl: "{{asset('vendor/ckeditor/ckfinder/ckfinder.html?type=Images')}}",
        filebrowserUploadUrl: "{{asset('vendor/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}",
        filebrowserImageUploadUrl: "{{asset('vendor/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}"
    });

    $('.tags').select2({'placeholder': 'أضف الوسوم التي تريدها هنا'});

    $(window).resize(function() {
        $('.tags').select2();
    });
  </script>
@endsection