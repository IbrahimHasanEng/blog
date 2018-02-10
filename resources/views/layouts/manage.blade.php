<!doctype html>
<html lang="ar" dir="rtl">

  <head>

    @include('partials._head')

    @yield('styles')

  </head>

  <body class="bg-light" style="text-align: right;">

    @include('partials._manage-nav')

    @yield('fixed')

    <div class="container-fluid py-4">
      <div class="row flex-wrap">
        @include('partials._manage-sidebar')
        <div class="col-lg-9 col-12">
          @include('partials._messages')
          
          <div class="card" id="vueApp">
            <div class="card-body">
                @yield('content')
            </div>
          </div>
        </div>

      </div>
    </div><!-- End of Container -->

    @include('partials._scripts')

    @yield('scripts')

  </body>

</html>