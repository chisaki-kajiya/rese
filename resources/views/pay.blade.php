@extends('layouts.default')

@section('title', '決済')

@section('content')
<div class="box-wrapper">
  <div class="box center">
    <div class="box__contents flex-column align-center">
      <h2 class="box__contents-text">
        予約情報
      </h2>
      <p></p>
      <table class="qrcode-table">
        <tr>
          <th>Shop</th>
          <td>{{$shop->name}}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{$user->name}}様</td>
        </tr>
        <tr>
          <th>Number</th>
          <td>{{$number}}人</td>
        </tr>
        <tr>
          <th>Date</th>
          <td>{{date('Y/m/d', strtotime($date))}}</td>
        </tr>
        <tr>
          <th>Time</th>
          <td>{{$time}}</td>
        </tr>
        <tr>
          <th>Course</th>
          <td>{{$course->name}}(¥{{$course->price}})</td>
        </tr>
        <tr>
          <th>Total</th>
          <td>{{ $total }}円</td>
        </tr>
      </table>
      {{Form::open(['url' => '/book/pay', 'method' => 'POST'])}}
      {{Form::token()}}

      {{Form::hidden('date', $date)}}
      {{Form::hidden('time', $time)}}
      {{Form::hidden('number', $number)}}
      {{Form::hidden('user_id', $user->id)}}
      {{Form::hidden('shop_id', $shop->id)}}
      {{Form::hidden('course_id', $course->id)}}
      {{Form::hidden('total', $total)}}

      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}" data-amount="{{$total}}" data-name="Stripe Demo" data-label="決済をする" data-locale="auto" data-currency="JPY">
      </script>

      {{Form::close()}}
      <a class="blue-btn center mb50 mt20" href="#" onclick="history.back()">戻る</a>
    </div>
  </div>
</div>
@endsection