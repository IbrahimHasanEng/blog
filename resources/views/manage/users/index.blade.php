@extends('layouts.manage')

@section('title', '- إدارة مستخدمي الموقع')

@section('content')
    <h2>إدارة مستخدمي الموقع</h2>
    <hr>
  <div class="row">
    <div class="col-12">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">اسم المستخدم</th>
            <th scope="col">البريد الالكتروني</th>
            <th scope="col">الدور</th>
            <th scope="col">تاريخ الإنشاء</th>
            <th scope="col">الأدوات</th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td><a href="{{ route('users.show', $user->id) }}" class="">{{ $user->name }}</td>
            <td>
                {{ $user->email }}
            </td>
            <td>
            @foreach( $user->roles as $role )
                {{$role->display_name}}
            @endforeach
            </td>
            <td>{{ Date::parse(strtotime($user->created_at))->format('j F، Y') }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">تعديل</a> 
                @if($user->id !== 1)
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()', 'class' => 'd-inline-block']) !!}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDelete{{ $user->id }}">
                        حذف
                    </button>
                    @include('partials._confirm-delete', ['title' => 'تأكيد حذف المستخدم', 'question' => 'هل أنت متأكد أنك تريد حذف المستخدم &#x27;' . $user->name . '&#x27;؟', 'idSuffex' => $user->id])
                    {!! Form::close() !!}
                @endif
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
@endsection