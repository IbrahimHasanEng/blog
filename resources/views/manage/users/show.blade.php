@extends('layouts.manage') 
@section('title', '- {{ $user->name }}') 

@section('content')

{{--  <img class="card-img-top" src="..." alt="Card image cap">  --}}
    <h5 class="card-title">عن {{ $user->name }}</h5>
    <p class="card-text">
        @foreach($user->roles as $role)
            {{ $role->display_name }}
        @endforeach
    </p>
    <p class="card-text">تاريخ إنشاء المستخدم: {{ Date::parse(strtotime($user->created_at))->format('j F، Y') }}</p>
    <a class="card-text" href="mailto:{{ $user->email }}">{{ $user->email }}</a>

@endsection