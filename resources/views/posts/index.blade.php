@extends('layouts.app')

@section('title', ' - جميع المقالات')

@section('content')

  <div class="d-flex justify-content-between align-items-center">
    <h1>جميع المقالات</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success btn-lg">إنشاء مقال جديد</a>
  </div>
  <hr>
  <div class="row">
    <div class="col-8 m-auto">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان المقال</th>
            <th scope="col">الفئة</th>
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
            <td>{{ Date::parse(strtotime($post->created_at))->format('j F، Y') }}</td>
            <td>
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link btn-sm">عرض</a>
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link btn-sm">تعديل</a>
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
