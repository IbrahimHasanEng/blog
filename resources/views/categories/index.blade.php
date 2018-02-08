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
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">تعديل</a> 
                @if($category->id !== 1)
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'd-inline-block']) !!}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDelete{{ $category->id }}">
                        حذف
                    </button>
                    @if($category->posts()->count() > 0)
                        @include('partials._confirm-delete', ['title' => 'تأكيد حذف الوسم', 'question' => 'يحتوي القسم &#x27;' . $category->name . '&#x27; على مقال أو أكثر. هل أنت متأكد أنك تريد حذفه؟', 'idSuffex' => $category->id])
                    @else
                        @include('partials._confirm-delete', ['title' => 'تأكيد حذف الوسم', 'question' => 'هل أنت متأكد أنك تريد حذف القسم &#x27;' . $category->name . '&#x27;؟', 'idSuffex' => $category->id])
                    @endif
                    {!! Form::close() !!}
                @endif
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