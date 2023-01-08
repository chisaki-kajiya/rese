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
    <h1 class="admin__header-text">
      Rese<span class="admin__header-text--border">@yield('title')</span>
    </h1>
  </header>

  <main>
    @yield('content')
  </main>
  <script src="/js/main.js"></script>
</body>

</html>