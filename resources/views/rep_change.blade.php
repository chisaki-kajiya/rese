@extends('layouts.default')

@section('title', '店舗責任者ページ')

@section('header_right')
<p class="admin__header-right">店舗責任者ページ</p>
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

  {{Form::open(['url' => '/rep/update', 'method' => 'POST'])}}
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
      <td>{{Form::textarea('image_url', $shop->image_url, ['rows' => '2'])}}</td>
    </tr>
  </table>
  {{Form::submit('変更')}}
  {{Form::close()}}
  <a href="/rep">もどる</a>
</div>
@endsection