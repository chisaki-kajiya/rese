@extends('layouts.default')

@section('title', '管理人ページ')

@section('header_right')
<p class="admin__header-right">管理人ページ</p>
@endsection

@section('content')
<div>
  <h2 class="admin__content-title">店舗責任者登録</h2>

  @if (count($errors) > 0)
  <div class="admin__error">
    <h3 class="red">登録エラー</h3>
    @foreach ($errors->all() as $error)
    <p class="red mt10">{{$error}}</p>
    @endforeach
  </div>
  @endif

  <form action="/admin/register" method="POST">
    @csrf
    <table class="admin__table">
      <tr>
        <th class="admin__table-head">名前</th>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <th class="admin__table-head">メールアドレス</th>
        <td><input type="email" name="email"></td>
      </tr>
      <tr>
        <th class="admin__table-head">パスワード</th>
        <td><input type="password" name="password"></td>
      </tr>
    </table>

    <button class="admin__register-btn">登録</button>
  </form>
</div>
@endsection