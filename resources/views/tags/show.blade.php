@extends('layouts.manage')

@section('title', '- وسم {{ $tag->name }}')

@section('content')
  <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1>وسم {{ $tag->name }}</h1>
            <div>
                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">تعديل اسم الوسم</a>
                <a href="{{ route('tags.index') }}" class="btn btn-success">إنشاء وسم جديد</a>
            </div>
        </div>
        <h3 class="text-secondary mt-3">{{ $tag->posts()->count() ? 'عدد المقالات التي تحتوي هذا الوسم: ' . $tag->posts()->count() : 'لا ينتمي هذا الوسم إلى أي مقال.' }}</h3>
      @if($tag->posts()->count())
        <hr>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">عنوان المقال</th>
                <th scope="col" class="d-none d-md-table-cell">الكاتب</th>
                <th scope="col" class="d-none d-md-table-cell">تاريخ الإنشاء</th>
                <th scope="col">الأدوات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                    <td>{{ $post->title }}</td>
                    <td class="d-none d-md-table-cell">ابراهيم حسن</td>
                    <td class="d-none d-md-table-cell">{{ Date::parse(strtotime($post->created_at))->format('j F، Y') }}</td>
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
        @else
        <hr>
        <a href="{{ route('posts.create') }}" class="btn btn-success">إنشاء مقال جديد</a>
        @endif
    </div>
  </div>

@endsection
