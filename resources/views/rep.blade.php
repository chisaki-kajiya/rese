@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<p class="admin__header-right">店舗責任者ページ</p>
@endsection

@section('content')
<div>
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
</div>
@endsection