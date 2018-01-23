@extends('main')

@section('title', ' - جميع المقالات')

@section('content')

  <h1>جميع المقالات</h1>
  <hr>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">عنوان المقال</th>
        <th scope="col">المحتوى</th>
        <th scope="col">تاريخ الإنشاء</th>
        <th scope="col">الأدوات</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{ mb_substr($post->body, 0, 50) }}{{ strlen($post->body) >= 50 ? "..." : "" }}</td>
        <td>{{ Date::parse(strtotime($post->created_at))->format('j F، Y') }}</td>
        <td>
          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-link btn-sm">عرض</a>
          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-link btn-sm">تعديل</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection
