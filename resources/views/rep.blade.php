@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<a href="/rep" class="admin__header-right">店舗責任者ページ</a>
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
    <div class="admin__error">
      <h3 class="red">登録エラー</h3>
      @foreach ($errors->all() as $error)
      <p class="red mt10">{{$error}}</p>
      @endforeach
    </div>
    @endif

    {{Form::open(['url' => '/rep/create', 'method' => 'POST'])}}
    {{Form::token()}}
    <table class="admin__table">
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
        <td>{{Form::textarea('image_url', null, ['rows' => '2'])}}</td>
      </tr>
    </table>
    {{Form::submit('登録')}}
    {{Form::close()}}

    @else
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
    <table class="rep-booking__table">
      <tr>
        <th>日程</th>
        <th>名前</th>
        <th>人数</th>
      </tr>
      @foreach($bookings as $booking)
      <tr>
        <td>{{$booking->getStart()}}</td>
        <td>{{$booking->name}}</td>
        <td>{{$booking->number}}</td>
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