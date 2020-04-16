<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <style media="screen">
    .links > a {
        color: #black;
        margin: 20px;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    </style>
    <title>@yield('title')</title>
    <nav @yield('navbar')>
      <div class="links all">
          <a href="{{ url('/') }}">Home</a>
          <a href="{{ url('/about') }}">About</a>
          <a href="{{ url('/services') }}">Services</a>
          <a href="{{ url('/corona') }}">Coronavirus</a>
          <a href="{{ url('/guide') }}">Guide</a>

      </div>
    </nav>

  </head>
  <body>


    <footer class='footer'>@yield('footer')

    </footer>
  </body>
</html>
