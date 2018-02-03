@extends('layouts.app')

@section('title', '- عرض المقال')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
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
          {{ Form::label('category_id', 'التصنيف') }}
          <select class="custom-select" name="category_id">
              <option style="font-style: italic; background: #ddd;" value="{{ $post->category->id }}" selected>محددة: {{ $post->category->name }}</option>
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

            <h6>التصنيف:</h6>
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
  <script>
      CKEDITOR.replace('edit_post', {
          language: 'ar'
      });
  </script>
@endsection
