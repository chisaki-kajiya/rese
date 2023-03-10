@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<a href="/rep" class="header-right">店舗責任者ページ</a>
@endsection

@section('content')
<div class="admin__content-wrapper">
  <p class="rep__top-name">{{$user->name}} さん</p>

  @if (session('flash_message'))
  <div class="flash_message">
    {{ session('flash_message') }}
  </div>
  @endif

  <div class="rep-shop__container">
    @if( empty($shop) == true )

    <h2>新規登録</h2>
    @if (count($errors) > 0)
    <div class="error mt10">
      <h3 class="red">登録エラー</h3>
      @foreach ($errors->all() as $error)
      <p class="red mt10">{{$error}}</p>
      @endforeach
    </div>
    @endif

    {{Form::open(['url' => '/rep/create', 'method' => 'POST', 'files' => true])}}
    {{Form::token()}}
    <table class="basic-table">
      <tr>
        <th class="admin__table-head">店舗名</th>
        <td>{{Form::text('name', null)}}</td>
      </tr>
      <tr>
        <th class="admin__table-head">エリア</th>
        <td>{{ Form::select('area_id', $areas) }}</td>
      </tr>
      <tr>
        <th class="admin__table-head">ジャンル</th>
        <td>{{ Form::select('genre_id', $genres) }}</td>
      </tr>
      <tr>
        <th class="admin__table-head">説明</th>
        <td>{{Form::textarea('outline' , null, ['rows' => '5'])}}</td>
      </tr>
      <tr>
        <th class="admin__table-head">画像</th>
        <td>{{Form::file('image', ['onchange' => 'showImage(this)'])}}</td>
      </tr>
    </table>
    <p class="mt20">ショップ画像はjpg, jpeg, png, gifのうちいずれかの形式で、8MG以下のファイルを指定してください。</p>
    <img src="storage/shop/noimage.jpeg" alt="img" class="rep-change__image" id="register-image">
    {{Form::submit('登録')}}
    {{Form::close()}}

    @else
    <div class="spacebtw">
      <h2 class="rep-shop__title">店舗情報</h2>
      <a href="/rep/update" class="blue-btn">編集する</a>
    </div>
    <div class="spacebtw">
      <div class="w40p">
        <img src="{{ asset($shop->image_path) }}" alt="img" class="rep-shop__image">
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
    @endif
  </div>

  @if( empty($shop) == false && $bookings->isEmpty())
  <div class="rep-booking__container">
    <h2 class="rep-booking__title">予約情報</h2>
    <p class="request-text mt10">予約がまだありません</p>
  </div>

  @elseif ( empty($shop) == false )
  <div class="rep-booking__container">
    <h2 class="rep-booking__title">予約情報</h2>
    <table class="basic-table">
      <tr>
        <th>日程</th>
        <th>名前</th>
        <th>人数</th>
        <th>コース</th>
        <th>価格</th>
      </tr>
      @foreach($bookings as $booking)
      <tr>
        <td>{{date('Y/m/d H:i', strtotime($booking->start))}}</td>
        <td>{{$booking->name}}</td>
        <td>{{$booking->number}}</td>
        <td>{{$booking->course_name}}</td>
        <td>{{$booking->course_price}}</td>
        <td>
          {{ Form::open(['url' => '/rep/mail', 'method' => 'GET']) }}
          {{Form::hidden('id', $booking->id)}}
          {{ Form::submit('メールを送る', ['class' => 'blue-btn'])}}
          {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </table>
  </div>
  @endif
</div>
@endsection

@section('js')
<script src="/js/register_image.js"></script>
@endsection