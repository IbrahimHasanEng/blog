@extends('layouts.manage')

@section('title', '- قسم {{ $category->name }}')

@section('content')
  <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1>
                @if($category->id == 1)
                    المقالات التي لا تنتمي لأي قسم
                @else
                قسم {{ $category->name }}
                @endif
            </h1>
            <div>
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">تعديل اسم القسم</a>
                <a href="{{ route('categories.index') }}" class="btn btn-success">إنشاء قسم جديد</a>
            </div>
        </div>
        <h3 class="text-secondary mt-3">

            {{ $category->posts()->count() ? 'عدد المقالات: ' . $category->posts()->count() : 'لا يوجد أي مقال ضمن هذا القسم.' }}
        </h3>
      @if($category->posts()->count())
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
                @foreach($category->posts as $post)
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
