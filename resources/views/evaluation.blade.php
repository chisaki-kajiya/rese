@extends('layouts.default')

@section('title', 'ショップ評価')

@section('content')
<div class="eval-wrapper">
  <div class="w48p w100p1150 center">
    @if (count($errors) > 0)
    <div class="booking-error">
      <h3 class="red">予約エラー</h3>
      @foreach ($errors->all() as $error)
      <p class="red mt10">{{$error}}</p>
      @endforeach
    </div>
    @endif

    {{ Form::open(['url' => '/mypage/evaluate', 'method' => 'POST']) }}
    {{ Form::token() }}
    {{ Form::hidden('booking_id', $history->id) }}
    <div class="booking-form">
      <h2 class="eval-title">評価内容</h2>

      <table class="eval-history-table">
        <tr>
          <th>Shop</th>
          <td>{{ $history->shop_name }}</td>
        </tr>
        <tr>
          <th>Number</th>
          <td>{{ $history->number }}人</td>
        </tr>
        <tr>
          <th>Date&Time</th>
          <td>{{ date('Y/m/d H:i', strtotime($history->start)) }}</td>
        </tr>
      </table>

      <div class="eval__star-wrapper">
        {{Form::radio('star', 1, false, ['class'=>'none','id'=>'star-radio1'])}}
        {{Form::label('star-radio1','★', ['class' => 'eval__star', 'id' => 'star1'])}}

        {{Form::radio('star', 2, false, ['class'=>'none','id'=>'star-radio2'])}}
        {{Form::label('star-radio2','★', ['class' => 'eval__star', 'id' => 'star2'])}}

        {{Form::radio('star', 3, false, ['class'=>'none','id'=>'star-radio3'])}}
        {{Form::label('star-radio3','★', ['class' => 'eval__star', 'id' => 'star3'])}}

        {{Form::radio('star', 4, false, ['class'=>'none','id'=>'star-radio4'])}}
        {{Form::label('star-radio4','★', ['class' => 'eval__star', 'id' => 'star4'])}}

        {{Form::radio('star', 5, false, ['class'=>'none','id'=>'star-radio5'])}}
        {{Form::label('star-radio5','★', ['class' => 'eval__star', 'id' => 'star5'])}}
      </div>
      {{Form::textarea('comment', null, ['placeholder' => 'コメントをご記入ください', 'rows' => '6', 'class' => 'eval__comment'])}}
    </div>

    {{ Form::submit('評価する', ['class' => 'booking-form__btn']) }}
    {{ Form::close() }}

  </div>

</div>
@endsection

@section('js')
<script src="/js/eval_star.js"></script>
@endsection