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

    </div>

    @include('partials._footer')

    @include('partials._scripts')

    @yield('scripts')

  </body>

</html>