@extends('layouts.default')

@section('title', 'ショップ詳細-{{$shop->name}}')

@section('content')
<div class="detail__wrapper">
  <div class="w48p">
    <div class="flex">
      <button class="detail__back-btn">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
      </button>
      <h2 class="detail__shop-name">仙人</h2>
    </div>

    <img src="{{$shop->image_url}}" alt="img" class="detail__shop-img">

    <p class="mb30">#{{$shop->getArea()}} #{{$shop->getGenre()}}</p>

    <p>#{{$shop->outline}}</p>
  </div>

  <div class="w48p">
    <div class="booking-form">
      <h2 class="booking-form__title">予約</h2>
      <input
        type="date"
        value="<?php echo date('Y-m-d'); ?>"
        class="booking-form__input"
        id="bookingDate">
      <select
        type="text"
        class="booking-form__input w95p"
        id="bookingTime">
        @for ($i = 17; $i < 22; $i+=1)
        <option value="{{ $i }}:00">{{ $i }}:00</option>
        @endfor
      </select>
      <select
        type="text"
        class="booking-form__input w95p"
        id="bookingNumber">
        @for ($i = 1; $i < 10; $i+=1)
        <option value="{{ $i }}">{{ $i }}人</option>
        @endfor
      </select>

      <div class="booking-confirmation__wrapper">
        <table class="booking-confirmation">
          <tr>
            <th class="booking-cfm__item-title">Shop</th>
            <td>{{$shop->name}}</td>
          </tr>
          <tr>
            <th class="booking-cfm__item-title">Date</th>
            <td id="cfmDate"></td>
          </tr>
          <tr>
            <th class="booking-cfm__item-title">Time</th>
            <td id="cfmTime"></td>
          </tr>
          <tr>
            <th class="booking-cfm__item-title">Number</th>
            <td id="cfmNumber"></td>
          </tr>
        </table>
      </div>
    </div>
    <button class="booking-form__btn">予約する</button>
  </div>
</div>
@endsection