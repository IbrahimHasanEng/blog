<div class="top-nav d-none d-md-block">
  <div class="container d-flex align-items-center h-100">
    <div class="date w-25 text-right"><i class="fa fa-calendar fa-fw"></i> {{ Date::now()->format('l، j F Y') }}</div>
    <div class="social-top h-100 mx-auto d-flex justify-content-between align-items-center">
      <a class="linkedin" href="#" target="_blank"><span class="align-middle"><i class="fa fa-linkedin fa-fw"></i></span></a>
      <a class="twitter" href="#" target="_blank"><span class="align-middle"><i class="fa fa-twitter fa-fw"></i></span></a>
      <a class="facebook" href="#" target="_blank"><span class="align-middle"><i class="fa fa-facebook-f fa-fw"></i></span></a>
      <a class="instagram" href="#" target="_blank"><span class="align-middle"><i class="fa fa-instagram fa-fw"></i></span></a>
      <a class="google-plus" href="#" target="_blank"><span class="align-middle"><i class="fa fa-google-plus fa-fw"></i></span></a>
      <a class="bloglovin" href="#" target="_blank"><span class="align-middle"><i class="fa fa-heart fa-fw"></i></span></a>
      <a class="pinterest" href="#" target="_blank"><span class="align-middle"><i class="fa fa-pinterest fa-fw"></i></span></a>
      <a class="youtube" href="#" target="_blank"><span class="align-middle"><i class="fa fa-youtube-play fa-fw"></i></span></a>
      <a class="tumblr" href="#" target="_blank"><span class="align-middle"><i class="fa fa-tumblr fa-fw"></i></span></a>
      <a class="rss" href="#" target="_blank"><span class="align-middle"><i class="fa fa-rss fa-fw"></i></span></a>
    </div>
    <div class="time w-25 text-left"><i class="fa fa-clock-o fa-fw fa-lg"></i> {{ Date::parse('now', date_default_timezone_get())->format('الساعة H:i بتوقيت إسطنبول') }}</div>
  </div>
</div><!-- Here Header Ends -->

<!-- Here Logo Starts -->
<div class="row justify-content-center w-100 d-none d-md-flex">
  <div class="col-4 mt-3 mb-2">
    <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="logo">
  </div>
</div><!-- Here Logo Ends -->

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
    <ul class="btn-group mr-auto my-0 navbar-nav" dir="ltr">
      @if (Auth::guest())
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">تسجيل الدخول</a></li>
      @else
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          أهلاً ابراهيم <i class="fa fa-chevron-down"></i></a>
        <div class="dropdown-menu dropdown-menu-left text-center animated" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('posts.create') }}">إنشاء مقال جديد</a>
          <a class="dropdown-item" href="{{ route('posts.index') }}">المقالات</a>
          <a class="dropdown-item" href="{{ route('categories.index') }}">الأقسام</a>
          <a class="dropdown-item" href="{{ route('tags.index') }}">الوسوم</a>
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