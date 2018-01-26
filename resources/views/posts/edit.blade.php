@extends('main')

@section('title', '- عرض المقال')

@section('styles')
  {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
      <div class="form-group">
        {{ Form::label('title', 'عنوان المقال:') }}
        {{ Form::text('title', null, array('class' => 'form-control form-control-lg')) }}
      </div>
      <div class="form-group">
        {{ Form::label('slug', 'سلاغ') }}
        {{ Form::text('slug', null, array('class' => 'form-control form-control-lg')) }}
      </div>
      <div class="form-group">
        {{ Form::label('body', 'محتوى المقال:') }}
        {{ Form::textarea('body', null, array('class' => 'form-control')) }}
      </div>
    </div>
    <div class="col-4">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">تفاصيل المقال</h5>
          <hr>
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
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/parsley-lang/ar.js') !!}
@endsection
