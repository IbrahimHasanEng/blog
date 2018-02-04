@extends('layouts.app')

@section('title', '- تواصل معنا')

@section('content')
  <form action="{{ url('contact') }}" method="POST">
      {!! csrf_field() !!}
    <div class="form-group">
      <label for="name">الاسم الكامل</label>
      <input type="text" name="name" class="form-control" placeholder="ادخل الاسم كاملاً">
    </div>

    <div class="form-group">
      <label for="email">البريد الالكتروني</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
    </div>

    <div class="form-group">
      <label for="subject">عنوان الرسالة</label>
      <input type="text" name="subject" class="form-control" id="subject" placeholder="اكتب عنوان الرسالة">
    </div>

    <div class="form-group">
      <label for="message">الرسالة</label>
      <textarea class="form-control" name="message" id="message" rows="3" placeholder="اكتب نص الرسالة هنا"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="أرسل">
  </form>
@endsection
