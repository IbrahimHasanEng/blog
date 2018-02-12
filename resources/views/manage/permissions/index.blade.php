@extends('layouts.manage')

@section('title', '- إدارة الصلاحيات')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
      <h1>إدارة الصلاحيات</h1>
      <a href="{{ route('permissions.create') }}" class="btn btn-success btn-lg">إنشاء صلاحيات جديدة</a>
    </div>
    <hr>
    <div class="row">
        @foreach($permissions as $permission)
        <div class="col-12">
            <div class="card mb-3">
                <h4 class="card-header">
                    {{ $permission->display_name }}
                    <br>
                    <small><em>{{ $permission->name }}</em></small>
                </h4>
                <div class="card-body">
                    <p>{{ $permission->description }}</p>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col-2"><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-block">تعديل</a></div>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection