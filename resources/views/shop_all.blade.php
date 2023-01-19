@extends('layouts.default')

@section('title', 'ショップ一覧')

@section('header_right')
<form action="/search" method="GET">
  <div class="search-box box">
    <select class="search-box__select" name="area_id" id="searchArea">
      <option value="">All area</option>
      @foreach($areas as $area)
      <option value="{{ $area->id }}" data-area-id="{{ $area->id }}">
        {{$area->name}}
      </option>
      @endforeach
    </select>

    <span class="gray-bar"></span>

    <select class="search-box__select" name="genre_id" id="searchGenre">
      <option value="">All genre</option>
      @foreach($genres as $genre)
      <option value="{{ $genre->id }}">
        {{$genre->name}}
      </option>
      @endforeach
    </select>

    <span class="gray-bar"></span>

    <button class="search-box__search-icon">
      <i class="fa fa-search" aria-hidden="true"></i>
    </button>

    <input type="text" name="name" value="Search ..." class="search-box__input" onfocus="if (this.value == 'Search ...')
      this.value = '';" onblur="if (this.value == '')
      this.value = 'Search ...';">
  </div>
</form>
@endsection

@section('content')
<div class="shop-card-wrapper">
  @foreach($shops as $shop)
  <div class="shop-card w22p w100p768 w45p1150">

    <div class="shop-card__top">
      <img src="{{$shop->image_url}}" alt="img" class="shop-card__image">
    </div>

    <div class="shop-card__content">
      <h2 class="shop-card__name">{{$shop->name}}</h2>
      <p class="shop-card__tag--area">#{{$shop->getArea()}} #{{$shop->getGenre()}}</p>

      <div class="spacebtw mt20">
        <form action="/detail">
          <input type="hidden" name="id" value="{{$shop->id}}">
          <button class="blue-btn">詳しくみる</button>
        </form>
        @if(Auth::check() && $shop->getLike()==false )
        <form action="/unlike" method="POST">
          @csrf
          <button class="shop-card__like--red" name="shop_id" value="{{$shop->id}}">❤︎</button>
        </form>
        @elseif(Auth::check())
        <form action="/like" method="POST">
          @csrf
          <button class="shop-card__like" name="shop_id" value="{{$shop->id}}">❤︎</button>
        </form>
        @else
        @endif
      </div>

    </div>
  </div>
  @endforeach
</div>
@endsection

@section('js')
<script src="/js/search.js"></script>
@endsection