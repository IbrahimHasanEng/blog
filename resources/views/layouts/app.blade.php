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

    {{--  @yield('carousel')  --}}

    <div class="container pt-5">
      {{--  @include('partials._messages')  --}}
      @yield('content')

    </div><!-- End of Container -->

    <footer>
      <hr>
      <div id="app" class="text-center">
        {{-- <example-component></example-component> --}}
      جميع الحقوق محفوظة 2018 &copy; ابراهيم حسن
      </div>
    </footer>

    @include('partials._scripts')

    @yield('scripts')

  </body>

</html>