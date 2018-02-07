<?php

use Jenssegers\Date\Date;

Date::setLocale('ar');
date_default_timezone_set('Europe/Istanbul');

?>

<!doctype html>
<html lang="ar" dir="rtl">

  <head>

    @include('partials._head')

    @yield('styles')

  </head>

  <body style="text-align: right;">

    @include('partials._nav')
    @yield('fixed')

    <div class="container pt-5">
      @include('partials._messages')
      @yield('content')

    </div><!-- End of Container -->

    @include('partials._footer')

    @include('partials._scripts')

    @yield('scripts')

  </body>

</html>