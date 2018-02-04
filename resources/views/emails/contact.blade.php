<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('partials._head')
    @yield('styles')
</head>
<body style="text-align: right;">
    <div class="row justify-content-center w-100 d-none d-md-flex">
        <div class="col-4 pt-5">
            <img class="img-fluid" src="{{ asset('images/logo.png') }}" alt="logo">
        </div>
    </div>
    <div class="container pt-5">
        <div class="card">
            <div class="card-header">
                    المرسل: {{ $name }}
            </div>
            <div class="card-body">
                <h5 class="card-title">عنوان الرسالة: {{ $subject }}</h5>
                <p class="card-text">{{ $messageBody }}</p>
                <hr>
                <a href="mailto:{{ $email }}" class="btn btn-link">مرسلة من قبل: {{ $email }}</a>
            </div>
        </div>
    </div>

    <footer>
        <hr>
        <div id="app" class="text-center">
        جميع الحقوق محفوظة 2018 &copy; ابراهيم حسن
        </div>
    </footer>
    @include('partials._scripts')
</body> 
</html>