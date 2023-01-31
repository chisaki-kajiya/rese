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
    <div class="error">
      <h3 class="red">予約変更エラー</h3>
      @foreach ($errors->all() as $error)
      <p class="red mt10">{{$error}}</p>
      @endforeach
    </div>
    @endif

    @if (session('flash_message'))
    <div class="flash_message {{session('style')}}">
      {{ session('flash_message') }}
    </div>
    @endif

    @if ($user->email_verified_at == null)
    <p class="request-text">RESEからのメールを確認すると、レストランの予約ができるようになります</p>

    @elseif( $bookings->isEmpty() )
    <p class="request-text">予約がありません</p>

    @endif

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
            <button class="mypage-booking__icon pointer">
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
              <td>{{ $booking->shop_name }}</td>
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

            <tr>
              <th class="mypage-booking__content-head">Date</th>
              <td>
                <input type="date" value="{{ date('Y-m-d', strtotime($booking->start)) }}" name="date" class="mypage-booking__input">
              </td>
            </tr>

            <tr>
              <th class="mypage-booking__content-head">Time</th>
              <td>
                <select type="time" name="time" class="mypage-booking__input">
                  @for ($i = 17; $i < 22; $i+=1) <option value="{{ $i }}:00" <?php if ($i == date('H', strtotime($booking->start))) {
                                                                                echo "selected";
                                                                              } ?>>
                    {{ $i }}:00
                    </option>
                    @endfor
                </select>
              </td>
            </tr>

            <tr>
              <th class="mypage-booking__content-head">Course</th>
              <td>
                @if( $booking->course_name == null)
                席のみ
                @else
                {{$booking->course_name}}(¥{{$booking->course_price}})
                @endif
              </td>
            </tr>

          </table>
        </form>

      </div>
      <button class="mypage-booking__change-btn" form="change">変更する</button>
    </div>
    @endforeach

    <h3 class="mypage__content-title">予約履歴</h3>

    @if( $histories->isEmpty() )
    <p class="request-text">予約履歴がありません</p>
    @endif

    @foreach($histories as $history)
    <div class="mypage-booking-card">
      <div class="mypage-history__card-top">

        <table class="basic-table">
          <tr>
            <th>Shop</th>
            <td>{{ $history->shop_name }}</td>
          </tr>
          <tr>
            <th>Number</th>
            <td>{{ $history->number }}人</td>
          </tr>
          <tr>
            <th>Date & Time</th>
            <td>{{ date('Y/m/d H:i', strtotime($history->start)) }}</td>
          </tr>
          <tr>
            <th>Course</th>
            <td>
              @if($history->course_name == null)
              席のみ
              @else
              {{ $history->course_name }}(¥{{ $history->course_price }})
              @endif
            </td>
          </tr>
        </table>

      </div>

      @if( $history->eval == null)

      {{ Form::open(['url' => '/evaluate', 'method' => 'GET']) }}
      {{ Form::hidden('booking_id', $history->id) }}
      {{ Form::submit('評価する', ['class' => 'mypage-history__card-bottom--hover'])}}
      {{ Form::close() }}

      @else
      <div class="mypage-history__card-bottom--done">評価済</div>

      @endif

    </div>
    @endforeach

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
          <img src="{{ asset($like->image_path) }}" alt="img" class="shop-card__image">
        </div>

        <div class="shop-card__content">
          <h2 class="shop-card__name">
            {{ $like->shop_name }}
          </h2>
          <div class="flex">
            <p class="shop-card__tag--area">
              #{{ $like->area_name }}
            </p>
            <p>#{{ $like->genre_name }}</p>
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