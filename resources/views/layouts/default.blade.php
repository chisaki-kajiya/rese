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
    <nav class="header-left">
      <span class="header__icon">
        <i class="fa fa-bars"></i>
      </span>
      <h1 class="header__title">Rese</h1>
    </nav>
    @yield('header_right')
  </header>
  <main>
    @yield('content')
  </main>
</body>

<script type="text/javascript" src=""></script>

</html>