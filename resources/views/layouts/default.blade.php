<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/b064dd4cf2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
  <title>Rese | @yield('title')</title>
</head>

<body>
  <header class="header">

    <div class="header-left">

      <nav class="drawer-menu" id="drawer-menu">
        <ul>
          <li><a href="/" class="drawer-menu__item">Home</a></li>

          @if(Auth::check())
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li><button class="drawer-menu__item">Logout</button></li>
          </form>
          <li><a href="/mypage" class="drawer-menu__item">Mypage</a></li>

          @else
          <li><a href="/register" class="drawer-menu__item">Registration</a></li>
          <li><a href="/login" class="drawer-menu__item">Login</a></li>
          @endif

          @if( isset(auth()->user()->role) == true && auth()->user()->role == 1)
          <li><a href="/admin" class="drawer-menu__item">管理人ページ</a></li>
          @elseif( isset(auth()->user()->role) == true && auth()->user()->role == 2)
          <li><a href="/rep" class="drawer-menu__item">店舗責任者ページ</a></li>
          @endif
        </ul>
      </nav>

      <div class="header__icon w20" id="header__icon">
        <span class="icon__line--top"></span>
        <span class="icon__line--middle"></span>
        <span class="icon__line--bottom"></span>
      </div>

      <h1 class="header__title">Rese</h1>

    </div>

    @yield('header_right')

  </header>

  <main>
    @yield('content')
  </main>
  <script src="/js/main.js"></script>
  @yield('js')
</body>

</html>