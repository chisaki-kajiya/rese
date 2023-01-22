@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<p class="admin__header-right">店舗責任者ページ</p>
@endsection

@section('content')
<div class="admin__content-wrapper">
  <p class="rep__top-name">{{$user->name}} さん</p>

  <div class="rep-shop__container">
    <div class="spacebtw">
      <h2 class="rep-shop__title">店舗情報</h2>
      <a href="/rep/update" class="blue-btn">編集する</a>
    </div>
    <div class="spacebtw">
      <div class="w40p">
        <img src="{{$shop->image_url}}" alt="img" class="rep-shop__image">
      </div>
      <div class="w55p">
        <table class="rep-shop__info-table">
          <tr>
            <th class="rep-shop__info-head">店舗名</th>
            <td>{{ $shop->name }}</td>
          </tr>
          <tr>
            <th class="rep-shop__info-head">エリア</th>
            <td>{{ $shop->area_name}}</td>
          </tr>
          <tr>
            <th class="rep-shop__info-head">ジャンル</th>
            <td>{{ $shop->genre_name }}</td>
          </tr>
          <tr>
            <th class="rep-shop__info-head">説明</th>
            <td>{{ $shop->outline }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="rep-booking__container">
    <h2 class="rep-booking__title">予約情報</h2>
    <table class="rep-booking__table">
      <tr>
        <th>日程</th>
        <th>名前</th>
        <th>人数</th>
      </tr>
      @foreach($bookings as $booking)
      <tr>
        <td>{{$booking->start}}</td>
        <td>{{$booking->name}}</td>
        <td>{{$booking->number}}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection