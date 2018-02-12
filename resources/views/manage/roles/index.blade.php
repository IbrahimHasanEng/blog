@extends('layouts.manage')

@section('title', '- إدارة الأدوار')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>إدارة الأدوار</h1>
        <a href="{{ route('roles.create') }}" class="btn btn-success btn-lg">إنشاء دور جديد</a>
    </div>
    <hr>
    <div class="row">
        @foreach($roles as $role)
        <div class="col-12">
            <div class="card mb-3">
                <h4 class="card-header">
                    {{ $role->display_name }}
                    <br>
                    <small><em>{{ $role->name }}</em></small>
                </h4>
                <div class="card-body">
                    <p>{{ $role->description }}</p>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-2"><a href="{{ route('roles.show', $role->id) }}" class="btn btn-secondary btn-block">عرض</a></div>
                        <div class="col-2"><a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-block">تعديل</a></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection