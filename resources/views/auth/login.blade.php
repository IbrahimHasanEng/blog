@extends('layouts.app')

@section('title', "- تسجيل الدخول")

@section('content')
<div class="container">
    <div class="row justify-content-md-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تسجيل الدخول</div>
                <div class="card-body">
                    <form lang="ar" class="form-horizontal" method="POST" action="{{ route('login') }}" novalidate>
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="email" class="col-lg-4 col-form-label text-lg-right">البريد الالكتروني</label>

                            <div class="col-lg-6">
                                <input
                                        id="email"
                                        type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                >

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-lg-4 col-form-label text-lg-right">كلمة المرور</label>

                            <div class="col-lg-6">
                                <input
                                        id="password"
                                        type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        required
                                >

                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="mr-4">تذكرني</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-8 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    تسجيل الدخول
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    هل نسيت كلمة المرور؟
                                </a>
                            </div>
                        </div>
                    </form>
                    ليس لديك حساب؟ <a href="{{ route('register') }}">إنشاء حساب جديد</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
