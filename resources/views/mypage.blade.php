@extends('layouts.default')

@section('title', 'マイページ')

@section('content')
<h2 class="mypage__top">
  {{ $user->name }}さん
</h2>
<div class="mypage__content-wrapper">
  <div class="w40p mb30_1150 w45p1150 w100p768">
    <h3 class="mypage__content-title">予約状況</h3>

    @if (count($errors) > 0)
    <div class="booking-error">
      <h3 class="red">予約変更エラー</h3>
      @foreach ($errors->all() as $error)
      <p class="red mt10">{{$error}}</p>
      @endforeach
    </div>
    @endif

    @if (session('flash_message'))
    <div class="flash_message">
      {{ session('flash_message') }}
    </div>
    @endif

    @if ($user->email_verified_at == null)
    <p class="request-text">RESEからのメールを確認すると、レストランの予約ができるようになります</p>

    @elseif( $bookings->isEmpty() )
    <p class="request-text">予約がまだありません</p>

    @else
    @foreach($bookings as $booking)
    <div class="mypage-booking-card">
      <div class="mypage-booking__card-top">

        <div class="spacebtw">
          <div class="align-center">
            <span class="mypage-booking__icon">
              <i class="fa fa-clock-o" aria-hidden="true"></i>
            </span>
            <p class="mypage-booking__card-title">予約{{ $loop->iteration }}</p>
          </div>

          <form action="/book/cancel" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $booking->id }}">
            <button class="mypage-booking__icon">
              <i class="fa fa-times-circle-o" aria-hidden="true"></i>
            </button>
          </form>
        </div>

        <form action="/book/change" method="post" id="change">
          @csrf
          <table class="mypage-booking__content">
            <input type="hidden" value="{{$booking->id}}" name="id">

            <tr>
              <th class="mypage-booking__content-head">Shop</th>
              <td>{{ $booking->getShop() }}</td>
            </tr>

            <tr>
              <th class="mypage-booking__content-head">Date</th>
              <td>
                <input type="date" value="{{ $booking->getDate() }}" name="date" class="mypage-booking__input">
              </td>
            </tr>

            <tr>
              <th class="mypage-booking__content-head">Time</th>
              <td>
                <select type="time" name="time" class="mypage-booking__input">
                  @for ($i = 17; $i < 22; $i+=1) <option value="{{ $i }}:00" <?php if ($i == $booking->getTime()) {
                                                                                echo "selected";
                                                                              } ?>>
                    {{ $i }}:00
                    </option>
                    @endfor
                </select>
              </td>
            </tr>

            <tr>
              <th class="mypage-booking__content-head">Number</th>
              <td>
                <select type="number" name="number" class="mypage-booking__input">
                  @for ($i = 1; $i < 10; $i+=1) <option value="{{ $i }}" <?php if ($i == $booking->number) {
                                                                            echo "selected";
                                                                          } ?>>
                    {{ $i }}人
                    </option>
                    @endfor
                </select>
              </td>
            </tr>

          </table>
        </form>

      </div>
      <button class="mypage-booking__change-btn" form="change">変更する</button>
    </div>
    @endforeach
    @endif

  </div>

  <div class="w55p w100p1150">
    <h3 class="mypage__content-title">お気に入り店舗</h3>

    <div class="mypage-booking__card-wrapper">

      @if( $likes->isEmpty() )
      <p class="request-text">お気に入りレストランがまだありません</p>
      @else

      @foreach($likes as $like)
      <div class="shop-card w45p w100p768">

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

            <form action="/detail" method="GET">
              <input type="hidden" name="id" value="{{ $like->shop_id }}">
              <button class="blue-btn">詳しくみる</button>
            </form>

            <form action="/unlike" method="POST">
              @csrf
              <button class="shop-card__like--red" name="shop_id" value="{{ $like->shop_id }}">❤︎</button>
            </form>

          </div>

        </div>
      </div>
      @endforeach

      @endif

    </div>
  </div>

</div>
@endsection