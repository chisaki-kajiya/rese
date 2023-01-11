@extends('layouts.default')

@section('title', '仮登録完了')

@section('content')
<div class="box-wrapper">
  <div class="box center">
    <div class="box__contents flex-column align-center">
      <h2 class="box__contents-text">
        登録確認メールを送信しました
      </h2>
      <p class="box__contents-text--btm">RESEからのメールを確認すると、レストランの予約ができるようになります</p>
      <a class="blue-btn center mb50" href="/">ホームへ戻る</a>
    </div>
  </div>
</div>
@endsection