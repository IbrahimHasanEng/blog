@extends('layouts.manage')

@section('title', ' - إنشاء صلاحيات جديدة')

@section('content')

<form id="simple" action="{{ route('permissions.update', $permission->id) }}" method="POST" novalidate>
    {{ method_field('PUT') }}    
    {{ csrf_field() }}
    <div class='form-group'>
        <label for="name">الصلاحية</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ $permission->name }}" placeholder="اكتب اسم الصلاحية باللغة الإنكليزية">
        @if($errors->has('name'))
            <div class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="display_name">الاسم المرئي</label>
        <input type="text" id="display_name" class="form-control" name="display_name" value="{{ $permission->display_name }}" placeholder="اكتب اسم الصلاحية المرئي باللغة العربية">
        @if($errors->has('display_name'))
            <div class="text-danger">
                <strong>{{ $errors->first('display_name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="description">الوصف</label>
        <input type="text" id="description" class="form-control" name="description" value="{{ $permission->description }}" placeholder="اكتب وصف الصلاحية">
        @if($errors->has('description'))
            <div class="text-danger">
                <strong>{{ $errors->first('description') }}</strong>
            </div>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">تعديل</button>
</form>

@endsection
                