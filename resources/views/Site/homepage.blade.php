@extends('layouts.main')

@section('title', '')
@section('class', 'pbmit-bg-color-blackish')

@section('header_content')
    <div class="pbmit-slider-social">
        <ul class="pbmit-social-links">
            @if($facebook = app(\App\Settings\Site::class)->facebook_link)
                <li class="pbmit-social-li pbmit-social-facebook">
                    <a href="{{$facebook}}" target="_blank">
                        <span><i class="pbmit-base-icon-facebook-squared"></i></span>
                    </a>
                </li>
            @endif

            @if ($twitter = app(\App\Settings\Site::class)->twitter_link)
                <li class="pbmit-social-li pbmit-social-twitter">
                    <a href="{{$twitter}}" target="_blank">
                        <span><i class="pbmit-base-icon-twitter"></i></span>
                    </a>
                </li>
            @endif

            @if ($instagram = app(\App\Settings\Site::class)->instagram_link)
                    <li class="pbmit-social-li pbmit-social-instagram">
                        <a href="{{$instagram}}" target="_blank">
                            <span><i class="pbmit-base-icon-instagram"></i></span>
                        </a>
                    </li>
            @endif

            @if($youtube = app(\App\Settings\Site::class)->youtube_link)
                <li class="pbmit-social-li pbmit-social-youtube">
                    <a href="{{$youtube}}" target="_blank">
                        <span><i class="pbmit-base-icon-youtube-play"></i></span>
                    </a>
                </li>
            @endif
        </ul>
    </div>

  <x-layout.header-image  :title="__('site.Home')" :breadcrumbs="[
      
    ]"/>
 
@endsection

@section('content')
    @if ($homepage_services_section)
        <section class="about-us-home1" data-cursor="global-color">
            <div class="container">
                <div class="row g-0" data-cursor="blackish-color">
                    <div class="col-md-7">
                        <div class="about-section-1">
                             <div class="pbmit-animation-style1" style="color: white">
                                         <h2 style="color:#FFFFFF">{{$homepage_services_section->title}}</h2>
                                    </div>
 
                           
                            <div class="position-relative">
                                <div class="">
                                    <div class="pbmit-animation-style1" style="color: white">
                                        {!! $homepage_services_section->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="about-right-section-home1">
                            <div class="pbmit-animation-style2">
                                <x-curator-glider
                                    :media="$homepage_services_section->image_id"
                                    class="img-fluid"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="service-section-home1 pbmit-element-service-style-1" data-cursor="global-color">
            <div class="container">
                  <div class="pbmit-animation-style1" style="color: white">
                <h2 style="color:#FFFFFF">{{$homepage_services_section->second_title}}</h2>
                 <br/>
                        {{\App\Helpers\Utilities::trimParagraph($homepage_services_section->description)}}
                </div>
              
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="swiper-slider pbmit-element-service-style-1"  data-cursor-text="Drag" data-loop="true" data-autoplay="false" data-dots="false" data-arrows="false"  data-columns="2.5" data-margin="30" data-effect="slide">
                            <div class="pbmit-ele-header-area"></div>
                            <div class="swiper-wrapper">
                                @foreach($services as $index => $service)
                                    <div class="swiper-slide">
                                        <article class="pbmit-service-style-1">
                                            <div class="pbminfotech-post-item">
                                                <div class="d-flex">
                                                    <div class="pbmit-service-image-wrapper" style="background-image:url('{{\Awcodes\Curator\Models\Media::find($service->image_id)?->url}}')">
                                                        <div class="pbmit-featured-img-wrapper">
                                                            <div class="pbmit-featured-wrapper">
                                                                <x-curator-glider
                                                                    :media="$service->image_id"
                                                                    class="img-fluid"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="pbminfotech-box-content pbmit-text-color-white ">
                                                        <div class="pbminfotech-box-number">{{$index + 1}}</div>
                                                        <h3 class="pbmit-service-title">
                                                            <a href="{{route('services.show', ['service' => $service])}}">{{$service->title}}</a></h3>
                                                        <div class="pbmit-service-content">
                                                            <div class="at-above-post-homepage addthis_tool"></div>
                                                            {!! $service->description !!}
                                                            <div class="at-below-post-homepage addthis_tool"></div>
                                                        </div>
                                                        <div class="pbmit-service-icon-wrapper">
                                                            <i class="pbmit-attorly-icon pbmit-attorly-icon-gavel-2"></i>
                                                        </div>
                                                        <div class="pbmit-service-btn">
                                                            <a class="btn-arrow" href="{{route('services.show', ['service' => $service])}}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($homepage_clients_slider)
        <section class="testimonail-section-home1" data-cursor="white-color">
            <div class="client-section-home1">
                <div class="container-fluid">
                    <div class="swiper-slider marquee">
                        <div class="swiper-wrapper">
                            @foreach($homepage_clients_slider->slides as $slide)
                                <div class="swiper-slide">
                                    <article class="pbmit-client-style-1">
                                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                                            <div class="pbmit-client-hover-img">
                                                <x-curator-glider
                                                    :media="$slide->hover_image_id"
                                                    class="img-fluid"
                                                />
                                            </div>
                                            <div class="pbmit-featured-wrapper">
                                                <x-curator-glider
                                                    :media="$slide->image_id"
                                                    class="img-fluid"
                                                />
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($blogs)
        <section class="overflow-hidden" data-cursor="global-color">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="pbmit-animation-style1" style="color: white">
                            <h2 style="color:#FFFFFF">@lang('site.Our Fresh Blogs')</h2>
                        </div>
                      
                    </div>
                    <div class="col-md-5">
                        <div class="blog-text-start text-end">
                            <a href="blog-grid.html" class="pbmit-btn pbmit-btn-inline pbmit-btn-inline-hover-white">
                                <span>@lang('site.View All Blog')</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="pbmit-posts-wrapper pbmit-element-blog-style-2">
                            @foreach($blogs as $blog)
                                <article class="pbmit-blog-style-2">
                                    <div class="post-item">
                                        <div class="pbminfotech-box-content">
                                            <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                                <div class="pbmit-meta-date"> {{\Carbon\Carbon::parse($blog->published_at)->format('M Y')}} </div>
                                            </div>
                                            <div class="pbmit-content-wrapper">
                                                <h3 class="pbmit-post-title">
                                                    <a href="{{route('blogs.show', ['blog' => $blog])}}">{{$blog->title}}</a>
                                                </h3>
                                                <div class="pbmit-meta-container">
                                                    <div class="pbmit-meta-cat-wrapper pbmit-meta-line">
                                                        <div class="pbmit-meta-category">
                                                            <a href="{{route('blogs.show', ['blog' => $blog])}}" rel="category tag">{{$blog->category->title}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endif
@endsection

@section('script')
    <script>
        if(typeof revslider_showDoubleJqueryError === "undefined") {function revslider_showDoubleJqueryError(sliderID) {console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion.");console.log("To fix this, you can:");console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on");console.log("2. Find the double jQuery.js inclusion and remove it");return "Double Included jQuery Library";}}
    </script>
@endsection