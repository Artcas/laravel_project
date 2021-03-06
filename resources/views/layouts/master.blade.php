<!DOCTYPE>

<html>
  <head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.css">
    <script type="text/javascript" src="/assets/js/jquery.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="/assets/js/init.js"></script>
    <script type="text/javascript" src="/assets/js/angular.min.js"></script>
  </head>
  <body>
@section('header')
  <div class="header">
    <ul>
      <li class="menu_li">
        <a href="/registration">Registration</a>
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
