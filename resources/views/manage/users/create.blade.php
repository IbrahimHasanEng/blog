@extends('layouts.manage') 
@section('title', '- إنشاء مستخدم جديد') 

@section('content')
<form lang="ar" class="form-horizontal" method="POST" action="{{ route('users.store') }}" novalidate>
    {{ csrf_field() }}
    <div class="form-group">
        <label for="userNameInput">الاسم الكامل</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="userNameInput" placeholder="أدخل الاسم كاملاً">
        @if ($errors->has('name'))
            <div class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="userEmailInput">البريدي الالكتروني</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="userEmailInput" aria-describedby="emailHelp" placeholder="أدخل البريد الالكتروني">
        @if ($errors->has('email'))
            <div class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="userRoleInput">الدور</label>
        <select name="role" value="{{ old('role') }}" class="custom-select" id="userRoleInput">
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
            @endforeach
        </select>
        @if ($errors->has('role'))
            <div class="text-danger">
                <strong>{{ $errors->first('role') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="userPasswordInput">كلمة المرور</label>
        <input type="password" name="password" class="form-control" id="userPasswordInput" placeholder="Password">
        @if ($errors->has('password'))
            <div class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">إنشاء</button>
</form>
@endsection