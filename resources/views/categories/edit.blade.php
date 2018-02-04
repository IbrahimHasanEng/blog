@extends('layouts.app')

@section('title', '- تعديل اسم القسم')

@section('content')
  <div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">تعديل اسم القسم</h5>    
                <hr>
                <div class="row">
                    <div class="col-12">
                        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                        {{ Form::text('name', $category->name, ['class' => 'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'أدخل اسماً معرفاً من فضلك']) }}
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