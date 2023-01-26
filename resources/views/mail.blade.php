@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<a href="/rep" class="admin__header-right">店舗責任者ページ</a>
@endsection

@section('content')
<div class="admin__content-wrapper">
  <h2 class="admin__content-title">予約確認メール</h2>
  <table class="rep-booking__table">
    <tr>
      <th>店名</th>
      <th>名前</th>
      <th>人数</th>
      <th>日程</th>
    </tr>
    <tr>
      <td id="shopName">{{$booking->shop_name}}</td>
      <td id="guestName">{{$booking->guest_name}}</td>
      <td id="number">{{$booking->number}}</td>
      <td id="start">{{$booking->getStart()}}</td>
    </tr>
  </table>
  {{ Form::open(['url' => '/rep/mail', 'method' => 'POST']) }}
  {{Form::hidden('id', $booking->id)}}
  {{Form::textarea('text', null, ['rows' => '15', 'id' => 'message'])}}
  {{ Form::submit('メールを送る', ['class' => 'blue-btn block mt20'])}}
  {{ Form::close() }}
</div>
@endsection

@section('js')
<script src="/js/mail.js"></script>
@endsection