<!-- resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @stack('styles')

    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="DashForge">
    <meta name="twitter:description" content="Responsive Bootstrap 5 Dashboard Template">
    <meta name="twitter:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">

    <meta property="og:url" content="http://themepixels.me/dashforge">
    <meta property="og:title" content="DashForge">
    <meta property="og:description" content="Responsive Bootstrap 5 Dashboard Template">
    <meta property="og:image" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/dashforge/img/dashforge-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <meta name="description" content="Responsive Bootstrap 5 Dashboard Template">
    <meta name="author" content="ThemePixels">

    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('template/admin/img/favicon.png') }}">
    <title>@yield('title', 'Disbud Indramayu')</title>

    <!-- Google Translate Widget -->
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
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    <!-- Vendor CSS -->
    <link href="{{ asset('template/admin/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/lib/ionicons/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/lib/remixicon/fonts/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/css/dashforge.css') }}" rel="stylesheet">
    <link href="{{ asset('template/admin/css/dashforge.dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('template/login/css/login.css')}}" rel="stylesheet">
</head>
<body>
    @unless (Request::is('login'))
        @include('layouts.sidebar')
    @endunless

    <div class="content ht-100v pd-0">
        @unless (Request::is('login'))
            @include('layouts.header')
        @endunless

        <div class="content-body">
            @yield('content')
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('template/admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/admin/lib/feather-icons/feather.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            feather.replace();
        });
    </script>
    <script src="{{ asset('template/admin/lib/ionicons/ionicons/ionicons.esm.js') }}" type="module"></script>
    <script src="{{ asset('template/admin/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template/admin/lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('template/admin/lib/jquery.flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('template/admin/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    

</body>
</html>
