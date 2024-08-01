<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>@yield('title', 'Disbud Indramayu')</title>
     {{-- <!-- Google Translate Widget -->
    <div id="google_translate_element"></div>
    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement({
          pageLanguage: 'id',
          includedLanguages: 'en,fr,de,es,it,ja,ko,pt,zh-CN',
          layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
      }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('template/masyarakat/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link href="{{ asset('template/masyarakat/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('template/masyarakat/css/templatemo-lugx-gaming.css') }}" rel="stylesheet">
    <link href="{{ asset('template/masyarakat/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('template/masyarakat/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template/masyarakat/css/custom.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/swiper@7/swiper-bundle.min.css" rel="stylesheet">
</head>
<body>
    <!-- Preloader -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    {{-- @include('masyarakat.partials.header') --}}

    <main>
        @yield('content')
    </main>

    @include('masyarakat.partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('template/masyarakat/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/masyarakat/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/masyarakat/js/isotope.min.js') }}"></script>
    <script src="{{ asset('template/masyarakat/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('template/masyarakat/js/counter.js') }}"></script>
    <script src="{{ asset('template/masyarakat/js/custom.js') }}"></script>

   
</body>
</html>
