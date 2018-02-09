<!-- Navbar Starts -->
<nav class="navbar navbar-expand-md navbar-light">
  <a class="navbar-brand d-md-none d-block w-25" href="#">
    <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="logo">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="navbar-nav ml-auto">
        <a class="nav-item nav-link {{ Request::is('/') ? "active" : "" }}" href="/">الصفحة الرئيسية<il class="sr-only">(current)</span></a>
        <a class="nav-item nav-link {{ Request::is('about') ? "active" : "" }}" href="/about">من نحن</a>
        <a class="nav-item nav-link" href="#">الخدمات</a>
        <a class="nav-item nav-link" href="#">المشاريع</a>
        <a class="nav-item nav-link {{ Request::is('blog') ? "active" : "" }}" href="/blog">مقالاتنا</a>
        <a class="nav-item nav-link {{ Request::is('contact') ? "active" : "" }}" href="/contact">تواصل معنا</a>
    </div>
    <ul class="btn-group mr-auto my-0 navbar-nav">
      @if (Auth::guest())
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">تسجيل الدخول</a></li>
      @else
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">مرحباً {{ Auth::user()->name }} <i class="fa fa-chevron-down fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-left text-center animated" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('manage.dashboard') }}">إدارة الموقع</a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              تسجيل الخروج
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
      </div>
      @endif
    </ul>
  </div>
</nav>