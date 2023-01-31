@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<a href="/rep" class="header-right">店舗責任者ページ</a>
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
      <td>{{$booking->shop_name}}</td>
      <td>{{$booking->guest_name}}</td>
      <td>{{$booking->number}}</td>
      <td>{{date('Y/m/d H:i', strtotime($booking->start))}}</td>
    </tr>
  </table>
  {{ Form::open(['url' => '/rep/mail', 'method' => 'POST']) }}
  {{ Form::token() }}
  {{Form::hidden('id', $booking->id)}}
  {{Form::textarea('text',
    $booking->guest_name.'さま

いつもRESEをご利用いただき、誠にありがとうございます。

レストランのご予約が確定いたしました。
下記にてご予約内容の確認をお願いいたします。

店名 : ' . $booking->shop_name . '
日時 : ' . date('Y/m/d H:i', strtotime($booking->start)). '
人数 : ' . $booking->number . '人
コース : ' . $booking->course_name . '

添付のQRコードよりご予約内容の確認をさせていただきます。
当日はどうぞお気をつけてお越しくださいませ。'
, ['rows' => '15'])}}
  <div class="mt20">
    {!! QrCode::size(200)->generate($url) !!}
  </div>
  {{ Form::submit('メールを送る', ['class' => 'blue-btn block mt20'])}}
  {{ Form::close() }}
</div>
@endsection