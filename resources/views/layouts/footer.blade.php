<footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">{{config('app.name')}}</span>
          </a>
          <div class="footer-contact pt-3">
            <p>{{config('app.address')}}</p>
            <a class="d-block" style="color: white!important" href="mailto:{{config('app.email')}}" target="_blank" class="text-light me-3"><i class="fa fa-envelope"></i><span class="d-none d-lg-inline-block ms-2">{{config('app.email')}}</span></a>
            <a class="d-block" style="color: white!important" href="tel:{{config('app.phone')}}" target="_blank" class="text-light me-3"><i class="fa fa-phone"></i><span class="d-none d-lg-inline-block ms-2">{{config('app.phone')}}</span></a>
            <a class="d-block" style="color: white!important" href="http://wa.me/:{{config('app.phone')}}" target="_blank" class="text-light me-3"><i class="fa fa-whatsapp"></i><span class="d-none d-lg-inline-block ms-2">{{config('app.phone')}}</span></a>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('about')}}">About us</a></li>
            <li><a href="{{route('shop')}}">Shop Page</a></li>
            <li><a href="{{route('features')}}">Features</a></li>
            <li><a href="{{route('testimonials')}}">Testimonials</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="{{route('contact')}}">Contact Us</a></li>
            <li><a href="#">Terms of Services</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Refund Policy</a></li>
            <li><a href="#">Data Policy</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="/assets/js/main.js"></script>


  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
  <script>
    new DataTable('#dataTable');
    var rte = new RichTextEditor("#RichTextEditor");
  </script>