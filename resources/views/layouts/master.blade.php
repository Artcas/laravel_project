<!DOCTYPE>

<html>
  <head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/init.js"></script>
  </head>
  <body>
@section('header')
  <div class="header">
    <ul>
      <li class="menu_li">
        <a href="/registraton">Registration</a>
      </li>
      <li class="menu_li">
         <a href="/login">login</a>
      </li>
      <li  class="menu_li">
        <a href="/">Home</a>
      </li>
    </ul>
  </div>
 @show     
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
