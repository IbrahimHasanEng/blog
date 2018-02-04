@extends('layouts.app')

@section('title', '- الأقسام')

@section('content')

  <h1>الأقسام</h1>
  <hr>
  <div class="row">
    <div class="col-8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">الأقسام</th>
            <th scope="col">عدد المقالات</th>
            <th scope="col">تاريخ الإنشاء</th>
            <th scope="col">الأدوات</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <th scope="row">{{ $category->id }}</th>
            <td><a href="{{ route('categories.show', $category->id) }}" class="">{{ $category->name }}</td>
            <td>
                {{ $category->posts()->count() }}
            </td>
            <td>{{ Date::parse(strtotime($category->created_at))->format('j F، Y') }}</td>
            <td>
                {{--  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">تعديل</a> 
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'd-inline-block']) !!}
                {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}  --}}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
          {{ $categories->links() }}
      </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">إنشاء قسم جديد</h5>    
                <hr>
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                        {{ Form::label('name', 'الأقسام') }}
                        {{ Form::text('name', null, ['class' => 'form-control', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'أدخل اسماً معرفاً من فضلك']) }}
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                        </div>
                        {{ Form::submit('إنشاء القسم الجديد', array('class' => 'btn btn-success btn-block')) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection