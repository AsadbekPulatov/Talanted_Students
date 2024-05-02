<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jamoa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('AdminPanel/assets/img/favicon.png')}}" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Nova/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Nova/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Nova/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="Nova/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Nova/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="Nova/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="Nova/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nova - v1.2.0
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-team">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="home" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="Nova/assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">Iqtidorli Talabalar</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="home">Asosiy</a></li>
                <li><a href="services">Davlat stipendiyalari</a></li>
                <li><a href="teams" class="active">Jamoa</a></li>
                <li><a href="blog">Yangiliklar</a></li>
                <li>
                    <a style="color: blue" href="Admin/dashboard">
                        @if(!is_null(auth()->id()))
                            Admin
                        @else
                            Log In
                        @endif
                    </a>
                </li>
            </ul>
        </nav>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('Nova/assets/img/team-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h1></h1>

      </div>
    </div><!-- End Breadcrumbs -->
      <section id="testimonials" class="testimonials">
          <div class="container" data-aos="fade-up">

              <div class="section-header">
                  <h2>Bizning Jamoa</h2>

              </div>

              <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                  <div class="swiper-wrapper">
                      <div class="swiper-slide">
                          <div class="col-lg-3 col-md-6; testimonial-item" style="width: 300px; height: 300px" data-aos="fade-up" data-aos-delay="100">
                              <div class="team-member">
                                  <div class="member-img mb-3">
                                  </div>
                              </div>
                          </div>
                      </div>
                      @foreach($leader as $val)
                          <div class="swiper-slide">
                              <div class="col-lg-3 col-md-6; testimonial-item" style="width: 300px; height: 300px" data-aos="fade-up" data-aos-delay="100">
                                  <div class="team-member">
                                      <a href="{{route('user.show',$val->user)}}">
                                          <div class="member-img mb-3">
                                              <img style="height: 250px" src="{{asset("Images/".$val->id."/".(\App\Models\Info::find($val->info_id))->image)}}" class="img-fluid" alt="">
                                          </div>
                                          <div class="member-info">
                                                  <span style="color: #ca0a0a">Rahbar</span>
                                              <h4 style="color: #0d161e;">{{$val->first_name}} {{$val->last_name}}</h4>
                                          </div>
                                      </a>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                      @foreach($team as $val)
                      <div class="swiper-slide">
                          <div class="col-lg-3 col-md-6; testimonial-item" style="width: 300px; height: 300px" data-aos="fade-up" data-aos-delay="100">
                              <div class="team-member">
                                  <a href="{{route('user.show',$val->user)}}">
                                  <div class="member-img mb-3">
                                      <img style="height: 250px" src="{{asset("Images/".$val->id."/".(\App\Models\Info::find($val->info_id))->image)}}" class="img-fluid" alt="">
                                  </div>
                                  <div class="member-info">
                                      @if($val->position=="Creator")
                                          <span style="color: #ca0a0a">Rahbar</span>
                                      @endif
                                      <h4 style="color: #0d161e;">{{$val->first_name}} {{$val->last_name}}</h4>
                                  </div>
                                  </a>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
                  <div class="swiper-pagination"></div>
              </div>

          </div>
      </section>
    <!-- ======= Team Section ======= -->

  </main><!-- End #main -->



  <footer id="footer" class="footer">

      <div class="footer-content" style="background-color: black">
          <div class="container">
              <div class="row gy-4">
                  <div class="col-lg-5 col-md-12 footer-info">
                      <a href="../home" class="logo d-flex align-items-center">
                          <span style="color: white">UB TUIT</span>
                      </a>
                      <p style="color: #949494">
                          Muhammad Al-Xorazmiy Nomidagi Toshkent Axborot Texnologiyalari Universiteti Urganch Filiali
                      </p>
                      <div class="social-links d-flex  mt-3">
                          {{--                          <a href="https://facebook.com/sfarruhbek_7" class="facebook"><i class="bi bi-facebook"></i></a>--}}
                          <a href="https://www.instagram.com/ubtuit_talents" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                          <a href="https://t.me/ubtuit_iqtidorli_talaba" target="_blank" class="instagram"><i class="bi bi-telegram"></i></a>
                      </div>
                  </div>

                  <div class="col-lg-2 col-6 footer-links">
                      <h4 style="color: #0080ff">Contact the Leader</h4>
                      <p style="color: #00ffd9">
                          <strong>Phone:</strong> +998975146477<br>
                          <strong>Email:</strong> sayidovagulnora0896@gmail.com<br>
                          <strong>Telegram:</strong> <a href="https://t.me/sayidovagulnora" target="_blank">@sayidovagulnora</a><br>
                      </p>
                  </div>

                  <div class="col-lg-2 col-6 footer-links">

                  </div>

                  <div class="col-lg-3 col-md-12 footer-contact text-justify text-md-start">
                      <h4 style="color: #0080ff">Contact the developer</h4>
                      <p style="color: #00ffd9">
                          <strong>Phone:</strong> +998904314201<br>
                          <strong>Email:</strong> satimbayevfarruhbek@gmail.com<br>
                          <strong>Telegram:</strong> <a href="https://t.me/sfarruhbek_7" target="_blank">@sfarruhbek_7</a><br>
                          <strong>Instagram:</strong> <a href="https://instagram.com/sfarruhbek_7" target="_blank">@sfarruhbek_7</a><br>
                      </p>

                  </div>

              </div>
          </div>
      </div>

      <div class="footer-legal" style="background-color: black">
          <div class="container">
              <div class="copyright" style="color: white">
                  &copy; <strong><span>Unusual Team</span></strong>.
              </div>
              <div class="credits" style="color: white">
                  <!-- All the links in the footer should remain intact. -->
                  <!-- You can delete the links only if you purchased the pro version. -->
                  <!-- Licensing information: https://bootstrapmade.com/license/ -->
                  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nova-bootstrap-business-template/ -->
                  Creator by <a href="https://t.me/sfarruhbek_7">S.Farruhbek</a>
              </div>
          </div>
      </div>

  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="Nova/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Nova/assets/vendor/aos/aos.js"></script>
  <script src="Nova/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Nova/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="Nova/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Nova/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Nova/assets/js/main.js"></script>

</body>

</html>
