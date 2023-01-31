@extends('layouts.default')

@section('title', '管理人ページ')

@section('header_right')
<a href="/admin" class="header-right">管理人ページ</a>
@endsection

@section('content')
<div class="admin__content-wrapper">
  <h2 class="admin__content-title">店舗責任者登録</h2>

  @if (count($errors) > 0)
  <div class="error mt20">
    <h3 class="red">登録エラー</h3>
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

  <form action="/admin/register" method="POST">
    @csrf
    <table class="basic-table">
      <tr>
        <th>名前</th>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td><input type="email" name="email"></td>
      </tr>
      <tr>
        <th>パスワード</th>
        <td><input type="password" name="password"></td>
      </tr>
    </table>

    <button>登録</button>
  </form>
</div>
@endsection