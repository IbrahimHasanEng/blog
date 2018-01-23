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

    <div class="container mt-4">

      @yield('content')

    </div><!-- End of Container -->

    @include('partials._scripts')

    @yield('scripts')

  </body>

</html>
