<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Stipendiyalar</title>
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

<body class="page-services">

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
                <li><a href="home">Asosiy</a></li>
                <li><a href="services" class="active">Davlat stipendiyalari</a></li>
                <li><a href="teams">Jamoa</a></li>
                <li><a href="blog">Yangiliklar</a></li>
                <li>@if(!is_null(auth()->id()))
                        <a href="/Admin/dashboard">
                            {{ auth()->user()->last_name.' '.auth()->user()->first_name }}
                        </a>
                    @else
                        <a style="color: blue" href="/Admin/dashboard">
                        Log In
                        </a>
                    @endif
                </li>
            </ul>
        </nav>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('Nova/assets/img/services-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Stipendiyalar</h2>
        <ol>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Our Services Section ======= -->
    <section id="services-list" class="services-list">
      <div class="container" data-aos="fade-up">

        <div class="section-header">

        </div>

        <div class="row gy-5">

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="bi bi-p-circle" style="color: #1335f5;"></i></div>
            <div>
              <h4 class="title"><a href="#stp1" class="stretched-link">O'zbekiston Respublikasi Prezidentining davlat stipendiyasi</a></h4>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="bi bi-behance" style="color: #d90769;"></i></div>
            <div>
              <h4 class="title"><a href="#stp2" class="stretched-link">Beruniy nomidagi davlat stipendiyasi</a></h4>
              <p class="description"></p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="icon flex-shrink-0"><i class="bi bi-brightness-high" style="color: #f5cf13;"></i></div>
            <div>
              <h4 class="title"><a href="#stp3" class="stretched-link">Islom Karimov nomli stipendiyasi</a></h4>
              <p class="description"></p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="icon flex-shrink-0"><i class="bi bi-code-slash" style="color: #15bfbc;"></i></div>
            <div>
              <h4 class="title"><a href="#stp4" class="stretched-link">O'zbekiston Respublikasi Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vazirligi stipendiyasi</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <div class="icon flex-shrink-0"><i class="bi bi-broadcast-pin" style="color: #15a04a;"></i></div>
            <div>
              <h4 class="title"><a href="#stp5" class="stretched-link">O'zbekiston Respublikasi radiotexnika,elektronika va aloqa ilmiy-texnika jamiyati stipendiyasi</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
            <div class="icon flex-shrink-0"><i class="bi bi-mortarboard" style="color: #f57813;"></i></div>
            <div>
              <h4 class="title"><a href="#stp6" class="stretched-link">Muhammad al-Xorazmiy nomidagi stipendiyasi</a></h4>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Our Services Section -->

      <!-- End Testimonials Section -->
      <section id="services-list" class="services-list">
          <div class="container" data-aos="fade-up">
              <div class="section-header">
                  <div data-aos="fade-up" data-aos-delay="100">
                      <div class="icon flex-shrink-0"></div>
                      <div>
                          <h4 class="title mb-5"><a class="stretched-link" id="stp1">O'zbekiston Respublikasi Prezidentining davlat stipendiyasi</a></h4>
                          <h7>Normativ-huquqiy hujjatlar loyihalari muhokamasi portalida Vazirlar Mahkamasining “Vazirlar Mahkamasining “O‘zbekiston iqtidorli yoshlarini taqdirlash va moddiy rag‘batlantirish to‘g‘risida” 2008 yil 13 oktabrdagi 226-son qaroriga o‘zgartirish va qo‘shimchalar kiritish to‘g‘risida”gi qarori loyihasi joylashtirildi.

                              Hujjat bilan Oliy ta'lim muassasalari bakalavriat ta'lim yo‘nalishlari talabalari uchun O‘zbekiston Respublikasi Prezidenti Davlat stipendiyalari, nomli Davlat stipendiyalari va ularni tayinlash tartibi to‘g‘risida nizom tasdiqlanishi mumkin. Shu munosabat bilan Vazirlar Mahkamasining 2008 yil 13 oktabrdagi 226-son qarorining 3-ilovasi o‘z kuchini yo‘qotgan deb topiladi.

                              Nizomga ko‘ra, oliy ta'lim muassasalari bakalavriat ta'lim yo‘nalishlari talabalari uchun O‘zbekiston Respublikasi Prezidentining davlat stipendiyalari davlat oliy ta'lim muassasalarida butun o‘qishi davomida faqat a'lo baholarga o‘qiyotgan oxirgi kurs O‘zbekiston Respublikasi fuqarolari bo‘lgan talabalarga tayinlanadi.

                              Beruniy, Ibn Sino, Navoiy, Ulug‘bek, Imom al-Buxoriy va Islom Karimov nomidagi davlat stipendiyalari (keyingi o‘rinlarda — nomli davlat stipendiyalari deb yuritiladi) O‘zbekiston Respublikasi davlat oliy ta'lim muassasalarining bakalavriat bo‘yicha o‘qiyotgan oxirgi ikki kurs O‘zbekiston Respublikasi fuqarolari bo‘lgan talabalarga tayinlanadi.

                              Kelgusi o‘quv yili uchun O‘zbekiston Respublikasi Prezidenti davlat stipendiyalari va nomli davlat stipendiyalari soni joriy o‘quv yili oxirida O‘zbekiston Respublikasi Oliy va o‘rta maxsus ta'lim vazirligi taqdimnomasiga binoan Vazirlar Mahkamasi tomonidan belgilanadi.

                              O‘zbekiston Respublikasi Oliy va o‘rta maxsus ta'lim vazirligi O‘zbekiston Respublikasi davlat oliy ta'lim muassasalari bo‘yicha nomli davlat stipendiyalarini taqsimlashni ta'lim ixtisosiga va talabalar soniga muvofiq amalga oshiradi.

                              Stipendiyalarni tayinlash uchun quyidagi mezonlarni bajarish belgilanadi:

                              a'lo o‘qish va ilmiy (ijodiy) ishlarda ishtirok etish;

                              kamida ikkita e'lon qilingan ishlar (asarlar)ning mavjudligi;

                              tillarni — davlat tilini va bitta xorijiy (Mustaqil Davlatlar Hamdo‘stligi mamlakatlari davlat tillaridan tashqari) tilni bilish, bakalavriatdagi ta'lim yo‘nalishi xorijiy til hisoblangan alohida hollarda qo‘shimcha ravishda yana bitta xorijiy tilni bilish talab qilinadi;

                              tillarni bilish bo‘yicha umumiy talablar darajasi O‘zbekiston Respublikasi Oliy va o‘rta maxsus ta'lim vazirligi tomonidan, oliy ta'lim muassasalarining tillar bo‘yicha ixtisoslashmagan mutaxassisliklar uchun xorijiy tillarga bo‘lgan talablari hajmida belgilanadi.

                              Oliy ta'lim muassasasining rasmiy veb saytida O‘zbekiston Respublikasi Prezidenti davlat stipendiyalari va nomli davlat stipendiyalariga tanlovlar bo‘yicha alohida bo‘lim (sahifa) ochiladi. Ushbu bo‘limda tanlovlarning e'lon qilinishi, hujjatlarni qabul qilish hamda tanlovlarni o‘tkazish muddatlari, talabgorlar to‘g‘risidagi ma'lumotlar, tanlovlarning har bir bosqichi va natijasi to‘liq yoritib boriladi.</h7>
                          <h7>O‘zbekiston Respublikasi Prezidenti davlat stipendiyalari va nomli davlat stipendiyalariga talabgorlar dastlabki ko‘rib chiqish uchun fakultet kengashiga quyidagilarni taqdim qiladilar:

                              sinov daftarchasidan ko‘chirma;

                              dekanat, kafedraning tavsiyanomasi;

                              ilmiy (ijodiy) ish rahbarining fikr-mulohazasi;

                              ilmiy ishlar ro‘yxati va ularning bosma nusxalari;

                              tillar kafedrasining suhbat natijalari haqidagi ma'lumotnomasi.

                              Barcha hujjatlar jildga tikilgan yoki papkaga joylangan holda taqdim etiladi. Muqovada O‘zbekiston Respublikasi Prezidenti davlat stipendiyasi yoki nomli davlat stipendiyasining nomi, talabgorning familiyasi, ismi va otasining ismi, fakulteti, kursi, guruhi ko‘rsatiladi.

                              Fakultet kengashida dekan, kafedra mudirlari, professor-o‘qituvchilar, talabalar ishtirokida talabgorlar bilan o‘quv va ilmiy faoliyatlari bo‘yicha suhbat o‘tkaziladi va ularning yig‘ma jildlari (butun o‘qishi davomida o‘zlashtirish ko‘rsatkichi, ilmiy ishlari, erishgan yutuqlari) batafsil o‘rganib chiqiladi va natijalari eng yuqori talabgorlar keyingi bosqichga tavsiya etiladi.

                              Fakultet kengashi tomonidan tavsiya etilgan talabgorlarning yig‘ma jildlari 30 avgustgacha Oliy ta'lim muassasasi kengashiga taqdim etiladi.

                              Oliy ta'lim muassasasi prorektorlari, fakultet dekanlari, kafedra mudirlari, professor-o‘qituvchilar, talabalar, jamoatchilik kengashi a'zolari ishtirokida belgilangan grafik asosida har bir nomzod 1 sentabrdan 15 sentabrga qadar talabalik davrida erishgan o‘quv, ilmiy, ma'naviy-ma'rifiy faoliyati to‘g‘risida oliy ta'lim muassasasi kengashida taqdimot qiladi.

                              Oliy ta'lim muassasasining rasmiy veb-sayti orqali 16 sentabrdan 25 sentabrgacha bo‘lgan muddatda oliy ta'lim muassasasi professor-o‘qituvchilari va talabalari tomonidan elektron ovoz berish orqali so‘rovnoma o‘tkaziladi.

                              Berilgan ovoz natijalariga ko‘ra oliy ta'lim muassasasi kengashi qarori bilan davlat stipendiyasiga tavsiya etish uchun Oliy va o‘rta maxsus ta'lim vazirligiga taqdim etiladi.

                              Tanlovlarning so‘ngi bosqichi - suhbat Oliy ta'lim muassasasi kengashi qarori bilan tuzilgan oliy ta'lim muassasasi rektori raisligidagi maxsus tanlov komissiyasi tomonidan o‘tkaziladi.

                              Maxsus tanlov komissiyasi tarkibiga oliy ta'lim muassasasi prorektorlari, fakultet dekanlari, kafedra mudirlari, professor-o‘qituvchilar, talabalar, jamoatchilik kengashi a'zolari kiritiladi.

                              Maxsus tanlov komissiyasi faoliyatiga bo‘ysunuviga ko‘ra vazirlik va idoralar hamda kadrlarning asosiy iste'molchilari bo‘lgan korxona va tashkilotlardan rahbar va xodimlar kelishuv asosida taklif etiladi.

                              Suhbat natijalariga ko‘ra tanlov g‘oliblari maxsus tanlov komissiyasi a'zolarining yashirin ovoz berish yo‘li bilan aniqlanadi.

                              Oliy ta'lim muassasasi rektori O‘zbekiston Respublikasi Prezidenti davlat stipendiyasi tanlovi g‘olibini tasdiqlash uchun Oliy va o‘rta maxsus ta'lim vazirligi hay'atiga taqdim etadi.

                              Maxsus tanlov komissiyasining qarori oliy ta'lim muassasasi rektorining talabalarga nomli davlat stipendiyalarini tayinlash va to‘lash haqidagi buyruqlarni rasmiylashtirishi uchun asos bo‘ladi.</h7>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section id="services-list" class="services-list">
          <div class="container" data-aos="fade-up">
              <div class="section-header">
                  <div data-aos="fade-up" data-aos-delay="100">
                      <div class="icon flex-shrink-0"></div>
                      <div>
                          <h4 class="title mb-5"><a id="stp2" class="stretched-link">Beruniy nomidagi davlat stipendiyasi</a></h4>
                          <h7>Beruniy (Abu Rayhon Beruniy) nomidagi Oʻzbekiston Respublikasi davlat mukofoti — fan va texnika sohasidagi mukofot. Ayrim olim yoki olimlar guruhiga ilmfan taraqqiyotiga ulkan hissa qoʻshadigan, yuksak amaliy ahamiyatga molik boʻlgan, respublika ilmfani va texnikasining jahon yutuklari darajasiga chiqishini taʼminlaydigan tadqiqotlar; respublika ilmiytexnika dasturlari, loyihalarini amalga oshirishda jiddiy natijalarga erishganlik; oʻz koʻrsatkichlariga koʻra eng yaxshi jahon namunalari darajasidagi yoki ulardan yuqori boʻlgan texnika, materiallar va texnologiyalarning yangi turlarini ishlab chiqqanlik, joriy etganlik va ishlab chiqarishda oʻzlashtirganlik; moddiy, tabiiy, mehnat resurslarining koʻplab tejalishini, atrof muhit muhofazasini taʼminlovchi texnologiyalarni yaratganlik va joriy etganlik; Oʻzbekistonning maʼnaviy merosi va uni rivojlantirish istiqbollarini, jamiyatning madaniy va ijtimoiy taraqqiyotini chuqur anglashga koʻmaklashadigan ijtimoiygumanitar fanlar sohasidagi alohida muhim yutuqlar; jamoatchilik tomonidan keng eʼtirof etilgan, uch va undan ortiq marta nashr qilingan, oʻzida yangi ilmiy gʻoyalarni mujassamlashtirgan, oliy oʻquv yurtlari uchun moʻljallangan original darsliklar uchun beriladi. Dastlab OʻzSSR Davlat mukofoti sifatida 1967-yil 6-sentabrda taʼsis etilgan. 1991-yil 5-martdan Oʻzbekiston Respublikasi Davlat mukofoti. Oʻzbekiston Respublikasi Vazirlar Mahkamasining 1996-yil 13-fevraldagi qarori bilan taʼsis qaroriga oʻzgartirishlar kiritilgan. Mukofotga takdim etilgan ishlarni tavsiya qilish, muhokamadan, ekspertizadan oʻtkazishni tashkil etish va mukofotlash bilan bogʻliq boshqa ishlarni bajarish uchun Oʻzbekiston Respublikasi Vazirlar Mahkamasi huzurida Fan va texnika sohasida Beruniy (Abu Rayhon Beruniy) nomidagi Oʻzbekiston Respublikasi Davlat mukofotlari qoʻmitasi tuzilgan. Mukofot Oʻzbekiston Respublikasi Prezidenti Farmoni bilan har 3 yilda Mustaqillik bayrami arafasida beriladi. Mukofotlanganlarga Abu Rayhon Beruniy tasviri tushirilgan faxriy nishon va tegishli guvohnoma topshiriladi. 1996 i.ga qadar 407 kishi shunday mukofotga sazovor boʻlgan.</h7>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section id="services-list" class="services-list">
          <div class="container" data-aos="fade-up">
              <div class="section-header">
                  <div data-aos="fade-up" data-aos-delay="100">
                      <div class="icon flex-shrink-0"></div>
                      <div>
                          <h4 class="title mb-5"><a id="stp3" class="stretched-link">Islom Karimov nomli stipendiyasi</a></h4>
                          <h7>O‘zbekiston Respublikasi Vazirlar Mahkamasining 2017 yil 23 iyundagi 417-sonli «O‘zbekiston Respublikasi Hukumatining ayrim qarorlariga o‘zgartish va qo‘shimchalar kiritish hamda ayrimlarini kuchini yo‘qotgan deb topish to‘g‘risida»gi qarori bilan O‘zbekiston hududida davlat stipendiyalari va stipendiyalar miqdori tasdiqlandi. Bu haqda Norma.uz yozmoqda.

                              Unga muvofiq, Islom Karimov nomidagi davlat stipendiyasini oluvchi talabalarga  «Islom Karimov davlat stipendiyasining sohibi» guvohnomasi topshiriladi.

                              Ma'lumki, Islom Karimov nomidagi davlat stipendiyasi Prezident Shavkat Mirziyoyevning 2017 yil 25 yanvardagi «O‘zbekiston Respublikasining Birinchi Prezidenti Islom Abdug‘aniyevich Karimov xotirasini abadiylashtirish to‘g‘risida»gi PQ-2744 qarori bilan tashkil etildi.

                              O‘zbekiston Prezidenti va Beruniy, Ibn Sino, Navoiy va Ulug‘bek stipendiyalari uchun joriy qilingan stipendiyani to‘lash va tayinlash tartibi Imom al Buxoriy va Islom Karimov nomidagi stipendiyalar uchun ham birdek amal qiladi. Bundan tashqari, talabalarga beriladigan stipendiyalarning boshlang‘ich miqdori ham tasdiqlandi.

                              Unga ko‘ra, O‘zbekiston Respublikasi Prezidenti stipendiyasi me'yordagi stipendiyaning 3 baravari miqdorida;

                              Beruniy, Ibn Sino, Navoiy, Ulug‘bek, Imom al Buxoriy va Islom Karimov nomidagi davlat stipendiyalari miqdori me'yordagi stipendiyaning 2 baravari miqdorida belgilangan.

                              Prezidentning ish haqlarini oshirishga doir farmonlari qabul qilinishi munosabati bilan Oliy va o‘rta-maxsus ta'lim vazirligining talabalar me'yoriy stipendiyalar miqdorini o‘zgartirishga oid maxsus buyrug‘i qabul qilinadi.</h7>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section id="services-list" class="services-list">
          <div class="container" data-aos="fade-up">
              <div class="section-header">
                  <div data-aos="fade-up" data-aos-delay="100">
                      <div class="icon flex-shrink-0"></div>
                      <div>
                          <h4 class="title mb-5"><a id="stp4" class="stretched-link">O'zbekiston Respublikasi Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vazirligi stipendiyasi</a></h4>
                          <h7>Axborot texnologiyalari va kommunikatsiyalar sohasida, „elektron hukumat“ni joriy etishda yagona davlat siyosati amalga oshirilishini taʼminlash, axborot texnologiyalarini rivojlantirishning jahon darajasidan kelib chiqqan holda milliy axborot-kommunikatsiya tizimini tatbiq etish va rivojlantirish yuzasidan kompleks dasturlarni ishlab chiqish va amalga oshirish;
                              telekommunikatsiya infratuzilmasini yanada rivojlantirish va modernizatsiya qilish, shu jumladan, Internet tarmog‘iga keng polosali ulanishni kengaytirish, telefon aloqasi, televideniye va radioeshittirishning raqamli tizimlariga to‘liq o‘tishni taʼminlash, aloqa va telekommunikatsiyalar sohasidagi faoliyatni, shuningdek, radiochastotali spektrdan foydalanishni davlat yo‘li bilan boshqarish, litsenziyalash va nazorat qilish borasidagi funksiyalarni amalga oshirish;
                              „elektron hukumat“ni tatbiq etish, vazirliklar, idoralar, kompaniyalar va uyushmalarning, mahalliy davlat hokimiyati organlarining axborotlashtirish va interaktiv davlat xizmatlarini takomillashtirish borasidagi faoliyatini idoralararo muvofiqlashtirish, monitoring qilish, baholash va nazorat qilish bo‘yicha davlat dasturlarining amalga oshirilishini taʼminlash, shuningdek, davlat axborot resurslari hamda maʼlumot bazalarini shakllantirish, saqlash va foydalanishning yagona tizimini vujudga keltirish, idoralararo axborot tizimlarini yaratish va boshqarish;
                              Internet tarmog‘ining milliy segmenti yanada shakllantirilishini taʼminlash, mamlakatimizning turli yo‘nalishlardagi zamonaviy veb-resurslarini, shu jumladan, aholining, xususan, yosh avlodning axborotga bo‘lgan va intellektual talab-ehtiyojlarini qondirish maqsadida tarmoq resurslarini rivojlantirish uchun zarur texnik va qulay shart-sharoitlarni yaratish;
                              raqobatdosh dasturiy mahsulotlarning mamlakatimizda ishlab chiqarilishini va ichki bozorini hamda ularga ko‘rsatiladigan xizmatlarni rivojlantirishga ko‘maklashish va uning muvofiqlashtirilishini taʼminlash, iqtisodiyotning real sektori tarmoqlarida va isteʼmolchilarda zamonaviy dasturiy mahsulotlar, axborot tizimlari va axborot resurslarini joriy etish;
                              axborot xavfsizligini taʼminlash va kommunikatsiya tarmoqlari, dasturiy mahsulotlar, axborot tizimlari va resurslarini himoya qilishning zamonaviy texnologiyalarini tatbiq etish chora-tadbirlarini amalga oshirish, axborot resurslarini himoya qilish bo‘yicha texnik infratuzilmani yanada rivojlantirish;
                              zamonaviy kommunikatsiya vositalari sohasida ilmiy tadqiqotlar va ishlanmalarni, kadrlarni tayyorlash, qayta tayyorlash va malakasini oshirishni tashkil qilish, dasturiy mahsulotlar, axborot tizimlari va maʼlumotlar bazalarini ishlab chiqish va tatbiq etish, axborot xavfsizligini taʼminlash va axborot-kommunikatsiya texnologiyalarining boshqa sohalarida shunday ishlarni tashkil etish;
                              aloqa, axborot texnologiyalari va kommunikatsiyalar sohasida xalqaro hamkorlikni yo‘lga qo‘yish, ustuvor loyihalarni amalga oshirish, radiochastotalik spektrdan samarali foydalanish uchun hamda vazirlik faoliyati doirasiga kiruvchi boshqa yo‘nalishlar bo‘yicha xorijiy investitsiyalarni jalb etish.</h7>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section id="services-list" class="services-list">
          <div class="container" data-aos="fade-up">
              <div class="section-header">
                  <div data-aos="fade-up" data-aos-delay="100">
                      <div class="icon flex-shrink-0"></div>
                      <div>
                          <h4 class="title mb-5"><a id="stp5" class="stretched-link">O'zbekiston Respublikasi radiotexnika,elektronika va aloqa ilmiy-texnika jamiyati stipendiyasi</a></h4>
                          <h7>Muhammad al-Xorazmiy nomidagi TATU Urganch filiali 2022-2023-o‘quv yili uchun Muhammad al-Xorazmiy nomidagi stipendiyasi, Oʻzbekiston Respublikasi Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vazirligi stipendiyasi va O'zbekiston Respublikasi radiotexnika, elektronika va aloqa ilmiy-texnika jamiyatining stipendiyalariga



                              Tanlovda ishtirok etish istagi bo‘lgan iqtidorli talabalarga quyidagi talablar qo‘yiladi:

                              QR kod orqali nizom bilan tanishib chiqgan holda 13-iyungacha quyidagi link orqali ro’yxatdan o’tishingiz so’raladi.

                              Tanlovda ishtirok etish istagida bo‘lgan iqtidorli talabalar o‘zlari o‘qiydigan fakultet dekanatiga murojaat qilishlari so‘raladi. Nomzodlar hujjatlari Nizom talablari bo‘yicha rasmiylashtirilishi lozim. Hujjatlar 2022-yilning 20-iyunga qadar Iqtidorli talabalarning ilmiy-tadqiqot faoliyatini tashkil etish bo‘limiga topshirilishi lozim.

                              Nomzodlar faqat fakultet dekanining tavsiyasiga binoan qabul qilinadi.

                              Ro’yxatdan o‘tish:

                              <a href="https://forms.gle/dY1EKaSjpEM8KRGE7">https://forms.gle/dY1EKaSjpEM8KRGE7</h7>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <section id="services-list" class="services-list">
          <div class="container" data-aos="fade-up">
              <div class="section-header">
                  <div data-aos="fade-up" data-aos-delay="100">
                      <div class="icon flex-shrink-0"></div>
                      <div>
                          <h4 class="title mb-5"><a id="stp6" class="stretched-link">Muhammad al-Xorazmiy nomidagi stipendiyasi</a></h4>
                          <h7>O‘zbekiston Respublikasi Prezidentining 2018-yil 19-fevraldagi “Axborot texnologiyalari va kommunikatsiyalari sohasini yanada takomillashtirish chora-tadbirlari to‘g‘risida” PF-5349-son Farmoni, 2018-yil 19-fevraldagi “O‘zbekiston Respublikasi Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vazirligi faoliyatini tashkil etish to‘g‘risida” PQ-3549-son qaroriga muvofiq, shuningdek, Muhammad al-Xorazmiy nomidagi Toshkent axborot texnologiyalari universiteti va uning filiallarida kadrlar tayyorlash tizimini tubdan takomillashtirish va samaradorligini oshirish, o‘quv jarayoniga ta’limning kredit tizimini joriy qilish orqali universitetni jahonning nufuzli universitetlari qatoriga kirishini ta’minlash maqsadida Vazirlar Mahkamasi qaror qiladi:
                              1. O‘zbekiston Respublikasi Prezidentining 2018-yil 19-fevraldagi “Axborot texnologiyalari va kommunikatsiyalari sohasini yanada takomillashtirish chora-tadbirlari to‘g‘risida” PF-5349-son Farmoniga asosan Muhammad al-Xorazmiy nomidagi Toshkent axborot texnologiyalari universiteti (keyingi o‘rinlarda Universitet deb yuritiladi) va uning filiallarida 2018/2019 o‘quv yilidan boshlab axborot texnologiyalari va kommunikatsiyalari sohasida kadrlar tayyorlash bo‘yicha o‘qitishning kredit tizimini joriy etish taklifi ma’qullanganligi ma’lumot uchun qabul qilinsin.
                              2. Quyidagilar:
                              Oldingi tahrirga qarang.
                              (2-bandning ikkinchi xatboshisi O‘zbekiston Respublikasi Prezidentining 2021-yil 24-dekabrdagi PQ-60-sonli qaroriga asosan chiqarilgan — Qonunchilik ma’lumotlari milliy bazasi, 25.12.2021-y., 07/21/60/1177-son)
                              Muhammad al-Xorazmiy nomidagi Toshkent axborot texnologiyalari universiteti filiallarining namunaviy tuzilmasi 2-ilovaga muvofiq;
                              Muhammad al-Xorazmiy nomidagi Toshkent axborot texnologiyalari universiteti va uning filiallarida ta’limning kredit tizimi to‘g‘risidagi nizom 3-ilovaga muvofiq tasdiqlansin.
                              Belgilansinki, Universitet va uning filiallari (fakultetlar, kafedralar va boshqa tarkibiy bo‘linmalar) xodimlarining cheklangan umumiy soni oliy ta’lim muassasalari uchun o‘rnatilgan normativlarga muvofiq aniqlanadi.
                              Oldingi tahrirga qarang.
                              (2-bandning oltinchi xatboshisi O‘zbekiston Respublikasi Prezidentining 2021-yil 24-dekabrdagi PQ-60-sonli qaroriga asosan chiqarilgan — Qonunchilik ma’lumotlari milliy bazasi, 25.12.2021-y., 07/21/60/1177-son)
                              3. Quyidagilar ta’limning kredit tizimini joriy etish orqali Universitet va uning filiallarini rivojlantirishning asosiy yo‘nalishlari etib belgilansin:
                              Universitet va uning filiallari professor-o‘qituvchilari tarkibini yuqori darajada kasbiy pedagogik mahoratga ega bo‘lgan mutaxassislar bilan to‘ldirish, shuningdek, nufuzli xorijiy oliy ta’lim va ilmiy muassasalarda ta’lim olgan, malaka oshirgan, ilmiy darajalarini himoya qilgan iqtidorli pedagog kadrlar hamda amaliy ish tajribasiga ega bo‘lgan mutaxassislarni ta’lim jarayoniga keng jalb qilish;
                              xalqaro reytinglarda nufuzli o‘rinlarni egallagan xorijiy oliy ta’lim muassasalari bilan talabalar, professor-o‘qituvchilar, ilmiy-izlanuvchi olimlarning almashinuv dasturlarini keng joriy qilish, yetakchi xorijiy ilmiy-ta’lim muassasalari, ilmiy-tadqiqot markazlari bilan hamkorlikni mustahkamlash;
                              o‘quv jarayonini tashkil etishning samarali usullari va zamonaviy ta’lim texnologiyalarini o‘zlashtirish, malakali pedagog kadrlar uchun raqobat muhitini yaratish orqali ularning tajribasini muntazam oshirib borish;
                              talabaga o‘zining ta’lim dasturini mustaqil shakllantirish imkonini yaratish va bilimini baholashda oshkoralikni ta’minlash.
                              4. Universitet O‘zbekiston Respublikasi Oliy va o‘rta maxsus ta’lim vazirligi bilan kelishgan holda, ta’lim sifatini oshirish maqsadida xorijiy davlatlarning axborot-kommunikatsiya texnologiyalari sohasini rivojlantirish amaliyotidan kelib chiqib, ikki oy muddatda xalqaro andozalarga mos va ilg‘or pedagogik texnologiyalarga asoslangan o‘quv rejalari va dasturlari, bitiruvchilarning malaka talablarini ishlab chiqilishi hamda tasdiqlanishini ta’minlasin.
                              5. Belgilab qo‘yilsinki:
                              2018/2019 o‘quv yilidan boshlab Universitet va uning filiallari tarkibidagi akademik litseylarning ta’lim dasturlari zamonaviy axborot va pedagogik texnologiyalardan keng foydalanish asosida matematika, fizika, chet tili va axborot texnologiyalariga oid fanlar chuqur o‘qitilishi nazarda tutilgan holda ishlab chiqiladi;
                              Universitet va uning filiallari tarkibidagi akademik litseylarning pedagog kadrlari tarkibi 30 foizgacha Universitet va uning filiallaridan o‘rindoshlik asosida yuqori malakali pedagoglarni jalb etish hisobiga shakllantiriladi.
                              6. O‘zbekiston Respublikasi Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vazirligi Universitet bilan birgalikda ikki oy muddatda Axborot-kommunikatsiya texnologiyalarini rivojlantirish jamg‘armasi mablag‘lari hisobidan Universitet professor-o‘qituvchilari tarkibini “Scopus” va “Web of science” tizimiga kiruvchi xalqaro ilmiy jurnallarda ilmiy maqolalar chop etilishidan, shuningdek, ilmiy-uslubiy, ilmiy-tadqiqot, tashkiliy-uslubiy, ma’naviy-ma’rifiy va tarbiyaviy ishlar bajarilishidan kelib chiqqan holda moddiy rag‘batlantirish tartibini ishlab chiqsin va tasdiqlasin.
                              7. O‘zbekiston Respublikasi Vazirlar Mahkamasining 2013-yil 28-iyundagi “Muhammad al-Xorazmiy nomidagi Toshkent axborot texnologiyalari universiteti va uning hududiy filiallari tashkiliy tuzilmasini takomillashtirish to‘g‘risida” 188-son qarori o‘z kuchini yo‘qotgan deb hisoblansin.
                              8. O‘zbekiston Respublikasi Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vazirligi manfaatdor vazirlik va idoralar bilan birgalikda bir oy muddatda o‘zlari qabul qilgan normativ-huquqiy va boshqa hujjatlarni mazkur qarorga muvofiqlashtirsin.
                              9. Mazkur qarorning ijrosini nazorat qilish O‘zbekiston Respublikasi Bosh vazirining o‘rinbosari A.A. Abduxakimov va Axborot texnologiyalari va kommunikatsiyalarini rivojlantirish vaziri A.I. Axmedxadjayev zimmasiga yuklansin.</h7>
                      </div>
                  </div>
              </div>
          </div>
      </section>
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
                          <strong>Phone:</strong> +998934347734<br>
                          <strong>Email:</strong> adizovamriddin@gmail.com<br>
                          <strong>Telegram:</strong> <a href="https://t.me/Amir_A_B_97" target="_blank">@Amir_A_B_97</a><br>
                      </p>
                  </div>
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
