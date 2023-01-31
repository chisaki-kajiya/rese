@extends('layouts.default')

@section('title', 'ショップ一覧')

@section('header_right')
{{ Form::open(['url' => '/search', 'method' => 'GET']) }}
<div class="search-box box">
  <div class="search-box__row">
    {{ Form::select('area_id', $areas, $area ?? null, ['class'=>'search-box__select', 'placeholder'=>'All area', 'id'=>'search_area']) }}

    <span class="gray-bar--left"></span>

    {{ Form::select('genre_id', $genres, $genre ?? null, ['class'=>'search-box__select', 'placeholder'=>'All genre', 'id'=>'search_genre']) }}

    <span class="gray-bar--right"></span>
  </div>

  <div class="search-box__row">
    <i class="fa fa-search search-box__search-icon" aria-hidden="true"></i>

    {{ Form::text('name', $search ?? 'Search ...', ['class'=>'search-box__input', 'onfocus' => 'this.value = "";', 'id'=>'search_name'])}}

    {{ Form::submit('検索', ['class' => 'blue-btn shop-search-btn'])}}
  </div>

</div>
{{ Form::close() }}
@endsection

@section('content')
<div class="shop-card-wrapper">
  @if( $shops->isEmpty() )
  <p class="request-text">該当するレストランがありません</p>
  @else

  @foreach($shops as $shop)
  <div class="shop-card w22p w100p768 w45p1150">

    <div class="shop-card__top">
      <img src="{{ asset($shop->image_path) }}" alt="img" class="shop-card__image">
    </div>

    <div class="shop-card__content">
      <h2 class="shop-card__name">{{$shop->name}}</h2>
      <p class="shop-card__tag--area">#{{$shop->area_name}} #{{$shop->genre_name}}</p>

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

  @endif
</div>
@endsection

@section('js')
<script src="/js/search.js"></script>
@endsection