<div class="py-2 bg-secondary" style="border-radius: 0 0 30px 30px">
  <div class="row ">
    <div class="col-lg-8 col-5">
      <div class="ms-5">
        <a href="mailto:{{config('app.email')}}" target="_blank" class="text-light me-3"><i class="fa fa-envelope"></i><span class="d-none d-lg-inline-block ms-2">{{config('app.email')}}</span></a>
        <a href="tel:{{config('app.phone')}}" target="_blank" class="text-light me-3"><i class="fa fa-phone"></i><span class="d-none d-lg-inline-block ms-2">{{config('app.phone')}}</span></a>
        <a href="http://wa.me/:{{config('app.phone')}}" target="_blank" class="text-light me-3"><i class="fa fa-whatsapp"></i><span class="d-none d-lg-inline-block ms-2">{{config('app.phone')}}</span></a>
      </div>
    </div>
      <div class="col-lg-4 col-7">
        <div class="float-end me-5">
        <a href="#" target="_blank" class=" bg-light rounded-circle py-1 px-2 mx-1"><i class=" text-primary bi bi-facebook"></i></a>
        <a href="#" target="_blank" class=" bg-light rounded-circle py-1 px-2 mx-1"><i class=" text-primary bi bi-twitter-x"></i></a>
        <a href="#" target="_blank" class=" bg-light rounded-circle py-1 px-2 mx-1"><i class=" text-primary bi bi-instagram"></i></a>
        <a href="#" target="_blank" class=" bg-light rounded-circle py-1 px-2 mx-1"><i class=" text-primary bi bi-youtube"></i></a>
        <a href="#" target="_blank" class=" bg-light rounded-circle py-1 px-2 mx-1"><i class=" text-primary fa fa-linkedin"></i></a>
        </div>
      </div>
  </div>
</div>

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">{{config('app.name')}}</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('home')}}">Home<br></a></li>
          <li><a href="{{route('about')}}">About</a></li>
          <li><a href="{{route('shop')}}">Shop</a></li>
          <li><a href="{{route('features')}}">Features</a></li>
          <li><a href="{{route('testimonials')}}">Testimonials</a></li>
          <li><a href="{{route('contact')}}">Contact</a></li>
          <li><a href="{{route('admin-home')}}">Admin</a></li>
          <li class="dropdown"><a href="#" class="btn-getstarted px-4"><span>Vansh Kumar</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Cart</a></li>
              <li><a href="#">Checkout</a></li>
              <li><a href="#">Logout</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      {{-- <a class="btn-getstarted" href="index.html#about">Get Started</a> --}}

    </div>
  </header>