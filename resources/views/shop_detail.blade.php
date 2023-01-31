@extends('layouts.default')

@section('title', 'ショップ詳細')

@section('content')
<div class="detail__wrapper">
  <div class="w48p w100p1150">
    <div class="flex">
      <a href="#" class="detail__back-btn" onclick="history.back()">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
      </a>
      <h2 class="detail__shop-name">{{$shop->name}}</h2>
    </div>

    <div class="detail__gray-stars-wrapper">
      <span>★</span>
      <span>★</span>
      <span>★</span>
      <span>★</span>
      <span>★</span>
      <span id="star-point" class="detail__eval-point">{{number_format($star, 1)}}</span>
      {{ Form::open(['url' => '/evaluate/index', 'method' => 'GET', 'class' => 'detail__eval-form']) }}
      {{ Form::hidden('shop_id', $shop->id) }}
      {{ Form::submit($evals.'件', ['class' => 'detail__eval-text']) }}
      {{ Form::close() }}
    </div>

    <div class="detail__yellow-stars-wrapper">
      <span id="yellow-star1">★</span>
      <span id="yellow-star2">★</span>
      <span id="yellow-star3">★</span>
      <span id="yellow-star4">★</span>
      <span id="yellow-star5">★</span>
    </div>

    <img src="{{ asset($shop->image_path) }}" alt="img" class="detail__shop-img">

    <p class="mb20">#{{$shop->area_name}} #{{$shop->genre_name}}</p>

    <p class="mb30_768">{{$shop->outline}}</p>
  </div>

  <div class="w48p w100p1150">
    @if (count($errors) > 0)
    <div class="error">
      <h3 class="red">予約エラー</h3>
      @foreach ($errors->all() as $error)
      <p class="red mt10">{{$error}}</p>
      @endforeach
    </div>
    @endif

    @if(Auth::check() && empty($user->email_verified_at) == false)
    <form action="/book" method="POST">
      @csrf
      <div class="booking-form">
        <h2 class="booking-form__title">予約</h2>
        <input type="hidden" value="{{$shop->id}}" name="shop_id">

        <input type="date" value="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" class="booking-form__input" id="booking_date" name="date">

        <select type="time" class="booking-form__input w95p" id="booking_time" name="time">
          @for ($i = 17; $i < 22; $i+=1) <option value="{{ $i }}:00">{{ $i }}:00</option>
            @endfor
        </select>

        <select type="number" class="booking-form__input w95p" id="booking_number" name="number">
          @for ($i = 1; $i < 10; $i+=1) <option value="{{ $i }}">{{ $i }}人</option>
            @endfor
        </select>

        <select name="course_id" id="booking_course" class="booking-form__input w95p">
          <option value=0 selected>席のみのご予約</option>
          @foreach($courses as $course)
          <option value="{{ $course->id }}">{{ $course->name}}(¥{{$course->price}})</option>
          @endforeach
        </select>

        <div class="booking-confirmation__wrapper">
          <table class="booking-confirmation">
            <tr>
              <th class="booking-cfm__item-title">Shop</th>
              <td>{{$shop->name}}</td>
            </tr>
            <tr>
              <th class="booking-cfm__item-title">Date</th>
              <td id="cfm_date">{{date('Y/m/d', strtotime(now())) }}</td>
            </tr>
            <tr>
              <th class="booking-cfm__item-title">Time</th>
              <td id="cfm_time">17:00</td>
            </tr>
            <tr>
              <th class="booking-cfm__item-title">Number</th>
              <td id="cfm_number">1人</td>
            </tr>
            <tr>
              <th class="booking-cfm__item-title">Course</th>
              <td id="cfm_course">席のみのご予約</td>
            </tr>
          </table>
        </div>
      </div>
      <button class="booking-form__btn">予約する</button>
    </form>
    @elseif(Auth::check())
    <p class="request-text">RESEからのメールを確認すると、レストランの予約ができるようになります</p>
    @else
    <p class="request-text">ログインするとレストランの予約ができるようになります</p>
    @endif

  </div>
</div>
@endsection

@section('js')
<script src="/js/shop_star.js"></script>
<script src="/js/booking.js"></script>
@endsection