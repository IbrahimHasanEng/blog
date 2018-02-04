@extends('layouts.app')

@section('title', ' - جميع المقالات')

@section('content')

  <div class="d-flex justify-content-between align-items-center">
    <h1>جميع المقالات</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success btn-lg">إنشاء مقال جديد</a>
  </div>
  <hr>
  <div class="row">
    <div class="col-12 m-auto">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان المقال</th>
            <th scope="col">القسم</th>
            <th scope="col">الوسوم</th>
            <th scope="col">تاريخ الإنشاء</th>
            <th scope="col">الأدوات</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
          <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->name }}</td>
            <td>
              <?php $count = 0; ?>
              @foreach($post->tags as $tag)
                <?php $count++; ?>
                @if($count <= 4)
                  <span class="badge badge-dark">{{ $tag->name }}</span>
                @else
                  {{ '..' }}
                  @break
                @endif
              @endforeach
            </td>
            <td>{{ Date::parse(strtotime($post->created_at))->format('j F، Y') }}</td>
            <td>
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success btn-sm">عرض</a> 
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">تعديل</a> 
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'd-inline-block']) !!}
              {!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="d-flex justify-content-center">
    {!! $posts->links(); !!}
  </div>
@endsection
