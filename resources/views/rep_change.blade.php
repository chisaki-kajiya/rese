@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<a href="/rep" class="admin__header-right">店舗責任者ページ</a>
@endsection

@section('content')
<div class="admin__content-wrapper">
  <h2 class="admin__content-title">店舗情報変更</h2>

  @if (count($errors) > 0)
  <div class="admin__error">
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
  <table class="admin__table">
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
  <img src="{{ asset($shop->image_path) }}" alt="img" class="rep-change__image" id='image'>
  {{Form::submit('変更')}}
  {{Form::close()}}
  <a href="/rep" class="block mt20">もどる</a>
</div>
@endsection

@section('js')
<script src="/js/change_image.js"></script>
@endsection