@extends('layouts.default')

@section('title', 'ショップ評価一覧')

@section('content')
<div class="eval-detail__container">
  <div class="flex">
    <a href="#" class="detail__back-btn" onclick="history.back()">
      <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <h2 class="detail__shop-name">{{ $shop->name }}</h2>
  </div>

  <p class="eval-detail__title-bottom">#{{ $shop->area_name }} #{{ $shop->genre_name }}</p>
  @if($evals->isEmpty())
  <p class="request-text">評価がまだありません</p>
  @endif

  <div class="eval-card__wrapper">
    @foreach($evals as $eval)
    <div class="eval-card">
      <i class="fa fa-user eval-card__user-icon" aria-hidden="true"></i>
      <div>
        <div class="eval-card__stars-wrapper">
          @if($eval->star == 5)
          <span>★</span>
          <span>★</span>
          <span>★</span>
          <span>★</span>
          <span>★</span>
          @elseif($eval->star == 4)
          <span>★</span>
          <span>★</span>
          <span>★</span>
          <span>★</span>
          <span class="gray">★</span>
          @elseif($eval->star == 3)
          <span>★</span>
          <span>★</span>
          <span>★</span>
          <span class="gray">★</span>
          <span class="gray">★</span>
          @elseif($eval->star == 2)
          <span>★</span>
          <span>★</span>
          <span class="gray">★</span>
          <span class="gray">★</span>
          <span class="gray">★</span>
          @else
          <span>★</span>
          <span class="gray">★</span>
          <span class="gray">★</span>
          <span class="gray">★</span>
          <span class="gray">★</span>
          @endif
        </div>
        <p class="eval-card__comment">{{ $eval->comment }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection