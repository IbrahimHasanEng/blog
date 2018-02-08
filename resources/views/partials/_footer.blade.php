  <div class="footer mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="brand-info col-lg-4 col-sm-12 col-md-12 mb-3">
          <h5>معلومات عن الشركة</h5>
          <hr>
          <div class="text-center">
            <img class="img-fluid" src="{{asset('images/Logo.png')}}" alt="brandInfo">
          </div>
          <p>ما الذي لم أكن أريد معرفته عن أبي سعيد ومدينته المثالية؟ حاولت إذن أن أستقصي. جبت المخيّم الذي كنّا فيه، والقرى المجاورة، وبعض الأميال على طريق القوافل... كنت أصيخ سمعي، وأدرس، وسأقدّم لك نتائج هذا الاستقصاء، وأعدك أن أكون دقيقاً ما الذي لم
            أكن أريد معرفته عن أبي سعيد ومدينته المثالية؟ حاولت إذن أن أستقصي. </p>
        </div>
        <div class="footer-col-2 col-lg-4 col-sm-12 col-md-6 mb-3">
            <h5>أقسام</h5>
            <hr>
            <div class="row h-75 justify-content-between mx-0">
              @foreach($categoriesFooter as $category)
                @if($category->id !== 1)
                  @if($categoriesFooter->count() > 8)
                  <a href="" class="footer-col-2-item-1 d-flex col-md-6">{{ $category->name }}</a>
                  @else
                  <a href="" class="footer-col-2-item-1 d-flex col-md-12">{{ $category->name }}</a>
                  @endif
                @endif
              @endforeach
            </div>
        </div>
        <div class="footer-col-3 col-lg-4 col-sm-12 col-md-6 mb-3">
          <h5>المواضيع المميزة</h5>
          <hr>
          <ul class "list-unstyled">
            <li class="container d-flex align-items-start">
              <a href="#" class="ml-2">
                <img src="{{asset('images/Dragon.jpg')}}" alt="Dragon">
              </a>
              <div>
                <blockquote class="blockquote">
                  <a class="content" href="#">اغنية دراغون بول z</a>
                  <footer class="blockquote-footer">10 شباط 2018</footer>
                </blockquote>
              </div>
            </li>
            <hr>
            <li class="container d-flex align-items-start">
              <a href="#" class="ml-2">
                <img src="{{asset('images/Dragon.jpg')}}" alt="Dragon">
              </a>
              <div>
                <blockquote class="blockquote">
                  <a class="content" href="#">اغنية دراغون بول z</a>
                  <footer class="blockquote-footer">10 شباط 2018</footer>
                </blockquote>
              </div>
            </li>
            <hr>
            <li class="container d-flex align-items-start">
              <a href="#" class="ml-2">
                <img src="{{asset('images/Dragon.jpg')}}" alt="Dragon">
              </a>
              <div>
                <blockquote class="blockquote">
                  <a class="content" href="#">اغنية دراغون بول z</a>
                  <footer class="blockquote-footer">10 شباط 2018</footer>
                </blockquote>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <footer class="secondary-footer">
    <div class="container social-media">
      <span>للتواصل معنا:</span>
      <a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a>
      <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
      <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
      <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
      <span class="copyright align-bottom">جميع الحقوق محفوظة 2018 &copy; شركة 6S</span>
    </div>
  </footer>