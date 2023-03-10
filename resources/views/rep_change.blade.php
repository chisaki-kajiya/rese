@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<a href="/rep" class="header-right">店舗責任者ページ</a>
@endsection

@section('content')
<div class="admin__content-wrapper">
  <h2 class="admin__content-title">店舗情報変更</h2>

  @if (count($errors) > 0)
  <div class="error">
    <h3 class="red">変更エラー</h3>
    @foreach ($errors->all() as $error)
    <p class="red mt10">{{$error}}</p>
    @endforeach
  </div>
  @endif

  @if (session('flash_message'))
  <div class="flash_message mt20">
    {{ session('flash_message') }}
  </div>
  @endif

  {{Form::open(['url' => '/rep/update', 'method' => 'POST', 'files' => true])}}
  {{Form::token()}}
  {{Form::hidden('id', $shop->id)}}
  <table class="basic-table">
    <tr>
      <th class="admin__table-head">店舗名</th>
      <td>{{Form::text('name', $shop->name)}}</td>
    </tr>
    <tr>
      <th class="admin__table-head">エリア</th>
      <td>{{ Form::select('area_id', $areas, $shop->area_id) }}</td>
    </tr>
    <tr>
      <th class="admin__table-head">ジャンル</th>
      <td>{{ Form::select('genre_id', $genres, $shop->genre_id) }}</td>
    </tr>
    <tr>
      <th class="admin__table-head">説明</th>
      <td>{{Form::textarea('outline' , $shop->outline, ['rows' => '5'])}}</td>
    </tr>
    <tr>
      <th class="admin__table-head">画像</th>
      <td>{{Form::file('image', ['onchange' => 'showImage(this)'])}}</td>
    </tr>
  </table>

  <p class="mt20">ショップ画像はjpg, jpeg, png, gifのうちいずれかの形式で、8MG以下のファイルを指定してください。</p>
  <img src="{{ asset($shop->image_path) }}" alt="img" class="rep-change__image" id="change-image">
  {{Form::submit('変更', ['class' => 'pointer'])}}
  {{Form::close()}}
  <a href="/rep" class="block mt20 pointer">もどる</a>
</div>
@endsection

@section('js')
<script src="/js/change_image.js"></script>
@endsection