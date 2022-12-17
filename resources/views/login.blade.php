@extends('layouts.default')

@section('title', 'ログイン')

@section('content')
<h2 class="box__title">Login</h2>
<div class="box__contents">
  <form method="post" action="/login">
    @csrf
    <div class="box__contents-item">
      <span class="box__contents-item--icon">
        <i class="fa fa-envelope" aria-hidden="true"></i>
      </span>
      <input type="email" value="Email" name="email" class="box__contents-item--input">
    </div>
    <div class="box__contents-item">
      <span class="box__contents-item--icon">
        <i class="fa fa-lock" aria-hidden="true"></i>
      </span>
      <input type="text" value="Password" name="password" class="box__contents-item--input">
    </div>
    <button class="box__contents-btn">ログイン</button>
  </form>
</div>
@endsection