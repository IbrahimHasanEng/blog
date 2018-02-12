@extends('layouts.manage')

@section('title', '- {{ $role->display_name }}')

@section('content')

<h1>
    {{ $role->display_name }}
    <br>
    <small><em>{{ $role->name }}</em></small>
</h1>

<hr>
<div class="row">

    <div class="col-6">
        <h4>عن الدور</h4>
        <div class="lead">
            <p>{{ $role->description }}</p>
        </div>
    </div>

    <div class="col-6">
        <div class="card mb-3">
            <h4 class="card-header">
                الصلاحيات
            </h4>
            <div class="card-body">
                @foreach($role->permissions as $permission)
                <p><i class="fa fa-check-square-o fa-lg fa-fw text-success"></i> {{ $permission->display_name }} (<small>{{ $permission->description }}</small>)</p>
                @endforeach
            </div>
        </div>
    </div>

</div>
<hr>
<div class="col-6"><a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">تعديل</a></div>

@endsection