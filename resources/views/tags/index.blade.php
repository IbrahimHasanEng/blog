@extends('layouts.app')

@section('title', '- الوسوم')

@section('content')

  <h1>الوسوم</h1>
  <hr>
  <div class="row">
    <div class="col-8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الوسم</th>
            <th scope="col">تاريخ الإنشاء</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
          <tr>
            <th scope="row">{{ $tag->id }}</th>
            <td>{{ $tag->name }}</td>
            <td>{{ Date::parse(strtotime($tag->created_at))->format('j F، Y') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">إنشاء وسم جديد</h5>    
                <hr>
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'tags.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                        {{ Form::label('name', 'الوسمات') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                        </div>
                        {{ Form::submit('إنشاء الوسم الجديد', array('class' => 'btn btn-success btn-block')) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection