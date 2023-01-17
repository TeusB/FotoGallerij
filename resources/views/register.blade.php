@extends('layouts.app')

@section('sidebar')
@parent

@endsection

@section('content')
<h1>Register</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post" action="{{ route('insertUser') }}">
    {{ csrf_field() }}
    <label for="name">name</label>
    <input type="text" name="name" equired>
    <label for="email">email</label>
    <input type="text" name="email" equired>
    <label for="password">password</label>
    <input type="password" name="password" required></textarea>
    <button type="submit">register</button>
</form>
@endsection