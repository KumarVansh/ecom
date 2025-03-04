@extends('layouts.app')

@section('title')
      <title>{{config('app.name')}}-{{$title}}</title>
@endsection

@section('main')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">
  
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <h2 data-aos="fade-up" data-aos-delay="100">Bettter digital experience with Presento</h2>
              <p data-aos="fade-up" data-aos-delay="200">We are team of talented designers making websites with Bootstrap</p>
              <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                <a href="#about" class="btn-get-started">Get Started</a>
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
              </div>
            </div>
          </div>
        </div>
  
      </section><!-- /Hero Section -->  

      
      @include('partials.maincategory')
      @include('partials.about')
      @include('partials.facts')
      @include('partials.features')
      @include('partials.subcategory')
      @include('partials.product-slider')
      @include('partials.products')
      @include('partials.brands')
      @include('partials.testimonials')

@endsection

