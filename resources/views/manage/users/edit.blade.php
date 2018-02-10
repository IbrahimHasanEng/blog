@extends('layouts.manage') 
@section('title', '- تعديل المستخدم') 

@section('content')
<form lang="ar" class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}" novalidate>
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group">
        <label for="userNameInput">الاسم الكامل</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="userNameInput" placeholder="أدخل الاسم كاملاً">
        @if ($errors->has('name'))
            <div class="text-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="userEmailInput">البريدي الالكتروني</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="userEmailInput" aria-describedby="emailHelp" placeholder="أدخل البريد الالكتروني">
        @if ($errors->has('email'))
            <div class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="userRoleInput">الدور</label>
        <select name="role" value=" " class="custom-select" id="userRoleInput">
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

    <button type="submit" class="btn btn-primary">تعديل</button>
    <a class="btn btn-danger" href="{{ route('users.index') }}">إلغاء الأمر</a>
</form>
@endsection