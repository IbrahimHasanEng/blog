@extends('layouts.app')

@section('title', '- الفئات')

@section('content')

  <h1>جميع الفئات</h1>
  <hr>
  <div class="row">
    <div class="col-8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">التصنيف</th>
            <th scope="col">عدد المقالات</th>
            <th scope="col">تاريخ الإنشاء</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->name }}</td>
            <td>
                <?php $count = 0 ?>
                @foreach($posts as $post)
                  @if($post->category_id == $category->id)
                    <?php $count += 1 ?>
                  @endif
                @endforeach
                {{ $count }}
            </td>
            <td>{{ Date::parse(strtotime($category->created_at))->format('j F، Y') }}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">إنشاء تصنيف جديد</h5>    
                <hr>
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                        {{ Form::label('name', 'التصنيفات') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                        </div>
                        {{ Form::submit('إنشاء التصنيف الجديد', array('class' => 'btn btn-success btn-block')) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection