@extends('layouts.app')

@section('title', '- تعديل اسم الوسم')

@section('content')
  <div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">تعديل اسم الوسم</h5>    
                <hr>
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                        {{ Form::text('name', $tag->name, ['class' => 'form-control']) }}
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                        </div>
                        {{ Form::submit('حفظ التعديل', array('class' => 'btn btn-success btn-block')) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection