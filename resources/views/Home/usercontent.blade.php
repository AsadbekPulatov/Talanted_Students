<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{asset('AdminPanel/assets/img/favicon.png')}}" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('Nova/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('Nova/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('Nova/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('Nova/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('Nova/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('Nova/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('Nova/assets/css/main.css')}}" rel="stylesheet">
    <script src="{{asset('Qidiruv/script1.js')}}"></script>
    <script src="{{asset('Qidiruv/script2.js')}}"></script>
  <!-- =======================================================
  * Template Name: Nova - v1.2.0
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>


    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 300px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: #3c3f41;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}
</style>
<div class="page-blog">
  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="{{asset('Nova/assets/img/logo.png')}}" alt=""> -->
              <div class="container d-flex">
                  <div>
                      <h1 style="color: white">{{$user->first_name." ".$user->last_name}}</h1>
                      <a href="" style="color: #1aff00"><h3>{{$user->user}}</h3></a>
                  </div>
              </div>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="../home">Asosiy</a></li>
                <li><a href="../statutes">Nizomlar</a></li>
                <li><a href="../services">Davlat stipendiyalari</a></li>
                <li><a href="../teams">Jamoa</a></li>
                <li><a href="../blog">Yangiliklar</a></li>
                <li>
                    <a style="color: blue" href="../Admin/dashboard">
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
  </header>
  <!-- End Header -->
    <div class="modal fade bd-example-modal-lg" id="ReadMore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: unset">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="container" align="justify">
                            <form class="form-control" style="background-color: #14529a" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2">
                                    <div class="post-img" align="center">
                                        <img id="img" style="width: 100%" src="" alt="" class="img-fluid">
                                        <video id="vid" width="100%" class="post-img" controls>
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <h2 id="title" align="center" style="color: white">
                                    </h2>
                                </div>
                                <div class="mb-2">
                                    <div id="text" align="justify" style="color: white">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div role="document">
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('UsersContent/'.$user->id.'/'.$user->profile)}})">
      <div class="container position-relative d-flex flex-column">
              <div class="d-flex">
                  <div class="align-bottom p-5 bottom-8 top-3">
                  </div>
              </div>
      </div>
    </div>
      <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->

      <section id="blog" class="blog">
          <div class="container" data-aos="fade-up">

              <div class="row g-5">

                  <div class="col-lg-8 w-full" style="width: 100%" data-aos="fade-up" data-aos-delay="100">

                      <div class="row gy-5 posts-list">
                          <?php if(isset($posts)){ ?>
                          @foreach($posts as $val)
                              <div class="col-lg-4">
                                  <article class="d-flex flex-column">

                                      @if($val->type=="jpg")
                                          <div id="imgp">
                                              <img src="{{asset("Posts/$val->user_id/$val->location")}}" alt="" class="img-fluid">
                                          </div>
                                      @elseif($val->type=="mp4")
                                          <video id="vidp" controls>
                                              <source src="{{asset("posts/$val->user_id/$val->location")}}" type="video/mp4">
                                              Your browser does not support the video tag.
                                          </video>
                                      @endif

                                      <h2 class="title">
                                          <a href="">{{$val->title}}</a>
                                      </h2>

                                      <div class="meta-top">
                                          <ul>
                                              <li class="d-flex align-items-center"><i class="bi bi-person"></i><a href="">{{$user->user}}</a></li>
                                              <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href=""><time datetime="2022-01-01">{{$val->created_at}}</time></a></li>
                                              <li class="d-flex align-items-center"><i class="bi bi-eye"></i><a> {{$val->view}}</a></li>
                                          </ul>
                                      </div>

                                      <div style="" class="content">
                                          <p style="height: 50px">
                                              {{substr($val->text,0,200)}}@if(strlen($val->text)>=200)...@endif
                                          </p>
                                      </div>

                                      <div class="read-more mt-auto align-self-end">
                                          <a type="button" onclick="ReadMore({{$val->id}})" data-bs-toggle="modal" data-bs-target="#ReadMore">Read More<i class="bi bi-arrow-right"></i></a>
                                      </div>

                                  </article>
                              </div>
                          @endforeach
                          <?php } ?>
                              <!-- End post list item -->
                      </div>
                      <div class="blog-pagination">
                          <ul class="justify-content-center">
                              @if($dpage>3)
                                  <li <?php if (1==$dpage){ ?> class="active" <?php } ?>><a href="?page=1">1</a>
                                      @if($dpage!=4)
                                  </li><h3>...</h3>
                              @endif
                              @endif
                              @for($i=$dpage-2;$i<=$dpage+2;$i++)
                                  @if($i>0 && $i<=$mpage)
                                      <li <?php if ($i==$dpage){ ?> class="active" <?php } ?>><a href="?page={{$i}}">{{$i}}</a></li>
                                  @endif
                              @endfor
                              @if($dpage<=$mpage-3)
                                  @if($dpage+3!=$mpage)
                                      <h3>...</h3>
                                  @endif
                                  <li <?php if ($mpage==$dpage){ ?> class="active" <?php } ?>><a href="?page={{$mpage}}">{{$mpage}}</a></li>
                              @endif
                          </ul>
                      </div>

                  </div>


              </div>

          </div>
      </section>
      <!-- End Blog Section -->

  </main>
</div>


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

    <div id="views" style="display: none">
        <form method="GET" id="formgetid" action="{{ url('/view?id=5') }}" enctype="multipart/form-data" onsubmit="return view(this);">
            <button id="viewgetsub" type="submit"></button>
        </form>
    </div>
  <script src="{{asset("jquery.min.js")}}"></script>
  <script>
      let posts=@json($posts);
      function ReadMore(id)
      {
          if(posts[id]['type']=='jpg')
          {
              document.getElementById('img').style="display: block";
              document.getElementById('vid').style="display: none";
              document.getElementById('img').src="{{asset('Posts')}}"+"/"+posts[id]['user_id']+"/"+posts[id]['location'];
              $("#title").text(posts[id]['title']);
              $("#text").text(posts[id]['text']);
          }
          if(posts[id]['type']=='mp4')
          {
              document.getElementById('img').style="display: none";
              document.getElementById('vid').style="display: block";
              var option='<source id="video" src="{{asset('Posts')}}/'+posts[id]['user_id']+'/'+posts[id]['location']+'" type="video/mp4">';
              $("#vid").html(option);
              $("#title").text(posts[id]['title']);
              $("#text").text(posts[id]['text']);
          }
          document.getElementById('formgetid').action="{{ url('/view') }}"+"/?id="+posts[id]['id'];
          document.getElementById('viewgetsub').click();
      }
  </script>
  <script src="{{asset('Nova/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Nova/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('Nova/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('Nova/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('Nova/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('Nova/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('Nova/assets/js/main.js')}}"></script>
    <script>
        if(window.innerWidth>990)
        {
            document.getElementById('imgp').className="post-img";
            document.getElementById('vidp').className="post-img";
        }
    </script>
    <script>

        function view(form) {
            console.log("view");
            var ajax = new XMLHttpRequest();

            ajax.open("GET", form.getAttribute("action"), true);

            var formData = new FormData(form);
            ajax.send(formData);
            return false;
        }
    </script>
</div>
</html>
