<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Iqtidorli Talabalar</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('AdminPanel/assets/img/favicon.png')}}" />
    <!-- Google Fonts -->

    <!-- Vendor CSS Files -->
    <link href="Nova/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="Nova/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="Nova/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="Nova/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="Nova/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="Nova/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="Timer/classycountdown.css" rel="stylesheet">
    <link href="Timer/styles.css" rel="stylesheet">
    <link href="Timer/responsive.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="Nova/assets/css/main.css" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Nova - v1.2.0
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="page-index">

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="home" class="logo d-flex align-items-center">
                <h1 class="d-flex align-items-center">Iqtidorli Talabalar</h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="home" class="active">Asosiy</a></li>
                    <li><a href="services">Davlat stipendiyalari</a></li>
                    <li><a href="teams">Jamoa</a></li>
                    <li><a href="blog">Yangiliklar</a></li>
                    <li>
                        <a href="Admin/dashboard">
                            @if(!is_null(auth()->id()))
                            {{ auth()->user()->last_name.' '.auth()->user()->first_name }}
                            @else
                            Log In
                            @endif
                        </a>

                    </li>
                    @guest
                        <li>
                            <a href="{{ route('register') }}">Register</a>
                        </li>
                    @endguest
                </ul>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <h3 style="color:white;" data-aos="fade-up">Toshkent axborot texnologioyalari universiteti Urganch filiali</h3>
                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p style="color: #00ff66">“Iqtidorli yoshlarga o‘z vaqtida har tomonlama e’tibor qaratib, qo‘llab-quvvatlasak, o‘ylaymanki, ular katta-katta zafarlarni qo‘lga kiritadilar” Sh. Mirziyoyev</p>
                    </blockquote>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="https://www.youtube.com/watch?v=jU5oiXDnZkg" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span><a href="#">Biz haqimizda</a></span></a>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">
        @foreach($data as $item)
        <header data-bs-toggle="modal" data-bs-target="#ReadMore{{$item->id}}" class="header d-flex flex-column align-items-center" style="background-color: black; height: 15%; position:relative">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between mb-3" style="height: 50%">
                <a class="logo align-items-center">
                    <h5 class="d-flex align-items-center">{{$item->name}}</h5>
                </a>
                <section class="right-section d-flex align-items-center">
                    <div id="rounded-countdown" style="width: 77%" align="end">
                        <div class="countdown" data-remaining-sec="{{ strtotime($item->deadline)-strtotime(now()) }}"></div>
                    </div>
                </section>
            </div>
        </header>


        <div class="modal fade bd-example-modal-lg" id="ReadMore{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="container" align="justify">
                                <div class="mb-2">
                                    <h2 align="center">
                                        {{$item->name}}
                                    </h2>
                                </div>
                                <div class="mb-5">
                                    <div id="text" align="justify">
                                        {{$item->text}}
                                    </div>
                                </div>

                                <div class="mb-5">
                                    Kerakli hujjatlar
                                    <div id="text" align="justify">
                                        {!! nl2br(e($item->files_list)) !!}
                                    </div>
                                </div>

                                <form action="{{ route('user_task') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $item->id }}">
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? 0 }}">
                                    <input type="file" class="form-control mb-3" name="file" accept=".zip,.rar,.7zip">
                                    <button type="submit" class="btn btn-success w-100">Yuborish</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </main>


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
                            {{-- <a href="https://facebook.com/sfarruhbek_7" class="facebook"><i class="bi bi-facebook"></i></a>--}}
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

    <section class="right-section d-flex align-items-center" style="background-color: black; width: 100%">
    </section>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>
    <script src="Timer/jquery-3.1.1.min.js"></script>
    <script src="Timer/jquery.classycountdown.js"></script>
    <script src="Timer/jquery.knob.js"></script>
    <script src="Timer/jquery.throttle.js"></script>
    <script src="Timer/scripts.js"></script>
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
