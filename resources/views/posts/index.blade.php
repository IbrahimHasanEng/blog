@extends('layouts.manage')

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
            <td><a href="{{ route('posts.show', $post->id) }}">{{ mb_substr($post->title, 0, 40) }}{{ strlen($post->title) > 40 ? "..." : "" }}</a></td>
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
              <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">تعديل</a> 
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'd-inline-block']) !!}
              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDelete{{ $post->id }}">
                  حذف
              </button>
              @include('partials._confirm-delete', ['title' => 'تأكيد حذف المقال', 'question' => 'هل أنت متأكد أنك تريد حذف المقال &#x27;' . $post->title . '&#x27;؟', 'idSuffex' => $post->id])
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
