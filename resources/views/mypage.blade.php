@extends('layouts.default')

@section('title', 'マイページ')

@section('content')
<h2 class="mypage__top">
  {{ $user->name }}さん
</h2>
<div class="spacebtw prpl200">
  <div class="w40p">
    <h3 class="mypage__content-title">予約状況</h3>

    @foreach($bookings as $booking)
    <div class="mypage-booking-card">

      <div class="spacebtw">
        <div class="align-center">
          <span class="mypage-booking__icon">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </span>
          <p class="mypage-booking__card-title">予約1</p>
        </div>

        <form action="/book/cancel/{{$booking->id}}" method="POST">
          @csrf
          <button class="mypage-booking__icon">
            <i class="fa fa-times-circle-o" aria-hidden="true"></i>
          </button>
        </form>
      </div>

      <table class="mypage-booking__content">
        <tr>
          <th class="mypage-booking__content-head">Shop</th>
          <td>{{ $booking->getShop() }}</td>
        </tr>
        <tr>
          <th class="mypage-booking__content-head">Date</th>
          <td>{{ $booking->getDate() }}</td>
        </tr>
        <tr>
          <th class="mypage-booking__content-head">Time</th>
          <td>{{ $booking->getTime() }}</td>
        </tr>
        <tr>
          <th class="mypage-booking__content-head">Number</th>
          <td>{{ $booking->number }}人</td>
        </tr>
      </table>

    </div>
    @endforeach

  </div>

  <div class="w55p">
    <h3 class="mypage__content-title">お気に入り店舗</h3>

    <div class="mypage-booking__card-wrapper">

      @foreach($likes as $like)
      <div class="shop-card w45p">

        <div class="shop-card__top">
          <img src="{{ $like->getImage() }}" alt="img" class="shop-card__image">
        </div>

        <div class="shop-card__content">
          <h2 class="shop-card__name">
            {{ $like->getShop() }}
          </h2>
          <div class="flex">
            <p class="shop-card__tag--area">
              #{{ $like->getArea() }}
            </p>
            <p>#{{ $like->getGenre() }}</p>
          </div>

          <div class="spacebtw mt20">

            <form action="/mypage/detail" method="GET">
              <input type="hidden" name="id" value="{{ $like->shop_id }}">
              <button class="blue-btn">詳しくみる</button>
            </form>

            <form action="/mypage/unlike" method="POST">
              @csrf
              <button class="shop-card__like--red" name="shop_id" value="{{ $like->shop_id }}">❤︎</button>
            </form>

          </div>

        </div>
      </div>
      @endforeach

    </div>
  </div>

</div>
@endsection