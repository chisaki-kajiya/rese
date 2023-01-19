@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<p class="admin__header-right">店舗責任者ページ</p>
@endsection

@section('content')
<div>
  <p class="rep__top-name">{{$user->name}} さん</p>

  <div class="rep-shop__container">
    <div class="align-center">
      <h2 class="rep-shop__title">店舗情報</h2>
      <form action="">
        <button class="blue-btn">変更する</button>
      </form>
    </div>
    <div class="spacebtw">
      <div class="w40p">
        <img src="{{$user->getShopImage();}}" alt="img" class="rep-shop__image">
      </div>
      <div class="w55p">
        <table class="rep-shop__info-table">
          <tr>
            <th class="rep-shop__info-head">店舗名</th>
            <td>{{ $user->getShopName(); }}</td>
          </tr>
          <tr>
            <th class="rep-shop__info-head">エリア</th>
            <td>{{ $user->getShopArea(); }}</td>
          </tr>
          <tr>
            <th class="rep-shop__info-head">ジャンル</th>
            <td>{{ $user->getShopGenre(); }}</td>
          </tr>
          <tr>
            <th class="rep-shop__info-head">説明</th>
            <td>{{ $user->getShopOutline(); }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection