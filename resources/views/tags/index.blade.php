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
            <th scope="col">الوسوم</th>
            <th scope="col">عدد المقالات</th>
            <th scope="col">تاريخ الإنشاء</th>
            <th scope="col">الأدوات</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
          <tr>
            <th scope="row">{{ $tag->id }}</th>
            <td><a href="{{ route('tags.show', $tag->id) }}" class="">{{ $tag->name }}</td>
              <td>
                  {{ $tag->posts()->count() }}
              </td>
            <td>{{ Date::parse(strtotime($tag->created_at))->format('j F، Y') }}</td>
            <td>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">تعديل</a> 
                {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'd-inline-block']) !!}
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDelete{{ $tag->id }}">
                    حذف
                </button>
                @if($tag->posts()->count() > 0)
                @include('partials._confirm-delete', ['title' => 'تأكيد حذف الوسم', 'question' => 'لدى بعض المقالات الوسم &#x27;' . $tag->name . '&#x27;. هل أنت متأكد أنك تريد حذفه؟', 'idSuffex' => $tag->id])
                @else
                @include('partials._confirm-delete', ['title' => 'تأكيد حذف الوسم', 'question' => 'هل أنت متأكد أنك تريد حذف الوسم &#x27;' . $tag->name . '&#x27;؟', 'idSuffex' => $tag->id])
                @endif
                {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
          {{ $tags->links() }}
      </div>
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