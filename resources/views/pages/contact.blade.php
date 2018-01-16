@extends('main')

@section('title', '- تواصل معنا')

@section('content')
  <form>
    <div class="form-row">
      <div class="col">
        <input type="text" class="form-control" placeholder="الاسم">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="الكنية">
      </div>
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">البريد الالكتروني</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">الرسالة</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
  </form>
@endsection
