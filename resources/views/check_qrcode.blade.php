@extends('layouts.default')

@section('title', 'QRコード読取完了')

@section('content')
<div class="box-wrapper">
  <div class="box center">
    <div class="box__contents flex-column align-center">
      <h2 class="box__contents-text">
        予約情報
      </h2>
      <table class="qrcode-table">
        <tr>
          <th>Shop</th>
          <td>{{$booking->shop_name}}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{$booking->user_name}}</td>
        </tr>
        <tr>
          <th>Number</th>
          <td>{{$booking->number}}人</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>{{date('Y/m/d', strtotime($booking->start))}}</td>
        </tr>
        <tr>
          <th>Time</th>
          <td>{{date('H:i', strtotime($booking->start))}}</td>
        </tr>
      </table>
      <a class="blue-btn center mb50" href="/">ホームへ戻る</a>
    </div>
  </div>
</div>
@endsection