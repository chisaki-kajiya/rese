@extends('layouts.default')

@section('title', 'ショップ一覧')

@section('header_right')
<div class="box p10 align-center">
  <form action="/search" method="GET">
    @csrf
    <select class="search-box__select" name="area_id">
      <option value="">All area</option>
      @foreach($areas as $area)
      <option value="{{ $area->id }}">
        {{$area->name}}
      </option>
      @endforeach
    </select>

    <span class="gray-bar"></span>

    <select class="search-box__select">
      <option value="">All genre</option>
      @foreach($genres as $genre)
      <option value="{{ $genre->id }}">
        {{$genre->name}}
      </option>
      @endforeach
    </select>

    <span class="gray-bar"></span>

    <input type=" text" value="Search ..." class="search-box__input" onfocus="if (this.value == 'Search ...') this.value = '';" onblur="if (this.value == '') this.value = 'Search ...';" value="Search ...">
    <button>仮</button>
  </form>
</div>
@endsection

@section('content')
<div class="shop-card-wrapper">
  @foreach($shops as $shop)
  <div class="shop-card">

    <div class="shop-card__top">
      <img src="{{$shop->image_url}}" alt="" class="shop-card__image">
    </div>

    <div class="shop-card__content">
      <h2 class="shop-card__name">{{$shop->name}}</h2>
      <div class="flex">
        <p class="shop-card__tag--area">#{{$shop->getArea()}}</p>
        <p>#{{$shop->getGenre()}}</p>
      </div>

      <div class="spacebtw mt20">
        <a href="" class="blue-btn h18">詳しくみる</a>
        @if(Auth::check())
        @if($shop->likes->isEmpty()==1)
        <form action="/like" method="POST">
          @csrf
          <button class="shop-card__like" name="shop_id" value="{{$shop->id}}">❤︎</button>
        </form>

        @else
        <form action="/unlike" method="POST">
          @csrf
          <button class="shop-card__like--red" name="shop_id" value="{{$shop->id}}">❤︎</button>
        </form>
        @endif
        @endif
      </div>

    </div>
  </div>
  @endforeach
</div>
@endsection