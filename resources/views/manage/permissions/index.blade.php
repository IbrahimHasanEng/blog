@extends('layouts.manage')

@section('title', '- إدارة السماحيات')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h1>إدارة السماحيات</h1>
      <a href="{{ route('permissions.create') }}" class="btn btn-success btn-lg">إنشاء سماحية جديد</a>
    </div>
    <hr>
  <div class="row">
    <div class="col-12">
      <table class="table table-hover table-lg-responsive">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">السماحية</th>
            <th scope="col">الاسم المرئي</th>
            <th scope="col">الشرح</th>
            <th scope="col">تاريخ الإنشاء</th>
            {{--  <th scope="col">الأدوات</th>  --}}
          </tr>
        </thead>
        <tbody>
        @foreach($permissions as $permission)
          <tr>
            <th scope="row">{{ $permission->id }}</th>
            <td><a href="{{ route('permissions.show', $permission->id) }}" class="">{{ $permission->name }}</a></td>
            <td>
                {{ $permission->display_name }}
            </td>
            <td>
                {{ $permission->description }}
            </td>
            <td>{{ Date::parse(strtotime($permission->created_at))->format('j F، Y') }}</td>
            {{--  <td>
                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm">تعديل</a> 
                @if($permission->id !== 1)
                    {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'd-inline-block']) !!}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDelete{{ $permission->id }}">
                        حذف
                    </button>
                    @include('partials._confirm-delete', ['title' => 'تأكيد حذف المستخدم', 'question' => 'هل أنت متأكد أنك تريد حذف المستخدم &#x27;' . $permission->name . '&#x27;؟', 'idSuffex' => $permission->id])
                    {!! Form::close() !!}
                @endif
            </td>  --}}
          </tr>
        @endforeach
        </tbody>
      </table>
@endsection