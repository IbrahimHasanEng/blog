<?php

use Jenssegers\Date\Date;

Date::setLocale('ar');

?>

<!doctype html>
<html lang="ar" dir="rtl">

  <head>

    @include('partials._head')

    @yield('styles')

  </head>

  <body style="text-align: right;">

    @include('partials._nav')

    @yield('carousel')

    <div class="container mt-4">
      @include('partials._messages')
      @yield('content')

    </div><!-- End of Container -->

    <footer>
      <hr>
      <p id="app"></p>
    </footer>

    @include('partials._scripts')

    @yield('scripts')

  </body>

</html>
