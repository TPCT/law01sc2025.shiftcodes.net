<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <title>
        @if (app(\App\Settings\General::class)->site_title)
            @hasSection('title')
                @yield('title') -
            @endif
            {{app(\App\Settings\General::class)->site_title[app()->getLocale()] ?? config('app.name')}}
        @endif
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/storage/' . \Awcodes\Curator\Models\Media::find(app(\App\Settings\Site::class)->fav_icon)?->path)}}"/>

    <x-layout.seo></x-layout.seo>

    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/flaticon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pbminfotech-base-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/aos.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/shortcode.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/base.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/revolution/rs6.css')}}">

    @stack('style')

    <link rel="stylesheet" type="text/css" href="{{asset('/css/custom.css')}}">
</head>

<body class="homepage1-body {{app()->getLocale() == "ar" ? "arabic-version" : ""}}">
    <x-layout.header></x-layout.header>
    @if ($whatsapp_link = app(\App\Settings\Site::class)->$whatsapp_link)
        <div id="fixed-icon" class="show">
            <a href="{{$whatsapp_link}}" target="_blank">
                <img src="{{asset('/images/whats.png')}}" style="width:60px;height:60px">
            </a>
        </div>
    @endif
    <div class="page-content @yield('class')" style="min-height: 100vh">
        @yield('content')
    </div>

    <x-layout.footer></x-layout.footer>

    {!! NoCaptcha::renderJs() !!}

    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/popper.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('/js/jquery.appear.js')}}"></script>
    <script src="{{asset('/js/numinate.min.js')}}"></script>
    <script src="{{asset('/js/swiper.min.js')}}"></script>
    <script src="{{asset('/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/js/circle-progress.js')}}"></script>
    <script src="{{asset('/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('/js/aos.js')}}"></script>
    <script src="{{asset('/js/circle-progress.min.js')}}"></script>
    <script src="{{asset('/js/gsap.js')}}"></script>
    <script src="{{asset('/js/ScrollTrigger.js')}}"></script>
    <script src="{{asset('/js/SplitText.js')}}"></script>
    <script src="{{asset('/js/cursor.js')}}"></script>
    <script src="{{asset('/js/magnetic.js')}}"></script>
    <script src="{{asset('/js/hammer.min.js')}}"></script>
    <script src="{{asset('/js/timeline.js')}}"></script>
    <script src="{{asset('/js/gsap-animation.js')}}"></script>
    <script src="{{asset('/js/scripts.js')}}"></script>
    <script src="{{asset('/revolution/rslider.js')}}"></script>
    <script src="{{asset('/revolution/rbtools.min.js')}}"></script>
    <script src="{{asset('/revolution/rs6.min.js')}}"></script>

    @stack('script')

</body>
</html>
