<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="font-family: 'Droid Arabic Kufi';">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? "active" : "" }}" href="/"><i class="fa fa-home fa-fw fa-lg"></i> الصفحة الرئيسية</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('blog') ? "active" : "" }}" href="/blog">مقالاتنا</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('about') ? "active" : "" }}" href="/about">من نحن</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">المشاريع</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">الخدمات</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('contact') ? "active" : "" }}" href="/contact">تواصل معنا</a>
      </li>
    </ul>
    <ul class="btn-group mr-auto my-0" dir="ltr">
      <button type="button" class="btn btn-danger" dir="rtl">أهلاً ابراهيم!</button>
      <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-chevron-down"></i>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu text-right bg-dark">
        <a class="dropdown-item" href="{{ route('posts.index') }}">المقالات</a>
        <a class="dropdown-item" href="{{ route('posts.create') }}">إنشاء مقال جديد</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">تسجيل الخروج</a>
      </div>
    </ul>
  </div>
</nav>
