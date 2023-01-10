@extends('layouts.default')

@section('title', 'メールアドレス確認完了')

@section('content')
<div class="box-wrapper">
  <div class="box center">
    <div class="box__contents flex-column">
      <h2 class="box__contents-text">メールアドレスのご確認ありがとうございます</h2>
      <form action="/" method="GET" class="align-center">
        <button class="blue-btn mb50 center">レストランを探す</button>
      </form>
    </div>
  </div>
</div>
@endsection