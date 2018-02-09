@extends('layouts.manage')

@section('title', '- عرض المقال')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => 'true']) !!}
      <div class="form-group">
        {{ Form::label('title', 'عنوان المقال:') }}
        {{ Form::text('title', null, array('class' => 'form-control form-control-lg')) }}
        @if ($errors->has('title'))
            <div class="text-danger">
                <strong>{{ $errors->first('title') }}</strong>
            </div>
        @endif
      </div>
      <div class="form-group">
          {{ Form::label('category_id', 'القسم:') }}
          {{ Form::select('category_id', $categories, null, array('class' => 'form-control custom-select')) }}
          @if ($errors->has('category_id'))
              <div class="text-danger">
                  <strong>{{ $errors->first('category_id') }}</strong>
              </div>
          @endif
      </div>
      <div class="form-group">
          {{ Form::label('tags', 'الوسوم:') }}
          {{ Form::select('tags[]', $tags, null, ['class' => 'form-control custom-select tags', 'multiple' => 'multiple']) }}
          @if ($errors->has('category_id'))
              <div class="text-danger">
                  <strong>{{ $errors->first('category_id') }}</strong>
              </div>
          @endif
      </div>
      <div class="form-group">
        {{ Form::label('featured_image', 'صورة المقال الرئيسية:') }}
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" name="featured_image" id="inputFile">
                <label class="custom-file-label" name="featured_image" for="inputFile">{{ isset($post->image) ? asset('images/featured/' . $post->image) : 'اختر صورة المقال الرئيسية' }}</label>
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
        {{ Form::textarea('body', null, array('id' => 'edit_post', 'class' => 'form-control')) }}
        @if ($errors->has('body'))
            <div class="text-danger">
                <strong>{{ $errors->first('body') }}</strong>
            </div>
        @endif
      </div>
    </div>
    <div class="col-4">
      <div class="card">
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

          <hr>
          <div class="row">
            <div class="col-6">
              {!! Html::linkRoute('posts.show', 'إلغاء', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
            </div>
            <div class="col-6">
              {{ Form::submit('حفظ', array('class' => 'btn btn-success btn-block')) }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  {!! Html::script('vendor/ckeditor/ckeditor.js') !!}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.full.min.js"></script>
  <script>
    CKEDITOR.replace('edit_post', {
        language: 'ar',
        filebrowserBrowseUrl: "{{asset('vendor/ckeditor/ckfinder/ckfinder.html')}}",
        filebrowserImageBrowseUrl: "{{asset('vendor/ckeditor/ckfinder/ckfinder.html?type=Images')}}",
        filebrowserUploadUrl: "{{asset('vendor/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}",
        filebrowserImageUploadUrl: "{{asset('vendor/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}"
    });

    $('.tags').select2();

    $(window).resize(function() {
        $('.tags').select2();
    });
  </script>
@endsection
