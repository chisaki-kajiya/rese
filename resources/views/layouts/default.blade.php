<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/b064dd4cf2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/style.css">
  <title>Rese|@yield('title')</title>
</head>

<body>
  <header class="header">

    <div class="header-left">

      <nav class="drawer-menu" id="drawer-menu">
        <ul>
            <li><a href="/" class="drawer-menu__item">Home</a></li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li><button class="drawer-menu__item">Logout</button></li>
          </form>
            <li><a href="/mypage" class="drawer-menu__item">Mypage</a></li>
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
</body>

</html>