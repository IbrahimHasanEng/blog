@extends('layouts.app')

@section('title', '- تواصل معنا')

@section('content')
  <form action="{{ url('contact') }}" method="POST" novalidate>
      {!! csrf_field() !!}
    <div class="form-group">
      <label for="name">الاسم الكامل</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="ادخل الاسم كاملاً">
      @if ($errors->has('name'))
      <div class="text-danger">
          <strong>{{ $errors->first('name') }}</strong>
      </div>
      @endif
    </div>

    <div class="form-group">
      <label for="email">البريد الالكتروني</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" placeholder="name@example.com">
      @if ($errors->has('email'))
      <div class="text-danger">
          <strong>{{ $errors->first('email') }}</strong>
      </div>
      @endif
    </div>

    <div class="form-group">
      <label for="subject">عنوان الرسالة</label>
      <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" id="subject" placeholder="اكتب عنوان الرسالة">
      @if ($errors->has('subject'))
      <div class="text-danger">
          <strong>{{ $errors->first('subject') }}</strong>
      </div>
      @endif
    </div>

    <div class="form-group">
      <label for="message">الرسالة</label>
      <textarea class="form-control" name="message" id="message" value="{{ old('message') }}" rows="3" placeholder="اكتب نص الرسالة هنا"></textarea>
      @if ($errors->has('message'))
      <div class="text-danger">
          <strong>{{ $errors->first('message') }}</strong>
      </div>
      @endif    
    </div>
    <input type="submit" class="btn btn-primary" value="أرسل">
  </form>
@endsection
