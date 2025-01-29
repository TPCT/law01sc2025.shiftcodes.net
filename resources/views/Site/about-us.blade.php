@extends('layouts.main')

@section('title', __('site.About Us'))
@section('class', 'about-dark-section2')
@section('content')
    <x-layout.header-image class="pbmit-title-bar-style-1" :title="__('site.Our Services')" :breadcrumbs="[
       
    ]"/>

    @if ($about_us_services_section)
        <section class="section-lg pbmit-bg-color-blackish">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="about-dark2-left-section">
                             <div class="pbmit-animation-style1" style="color: white">
                                 <h2 style="color:#FFFFFF">{{$about_us_services_section->title}}</h2>
                            </div>
                         
                            <a href="{{route('services.index')}}" class="pbmit-btn pbmit-btn-inline pbmit-btn-inline-hover-white">
                                <span>@lang('site.View All Service')</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="row">
                            <div class="pbmit-heading bg-color-dark animation-style2">

                                <div class="pbmit-heading-desc">
                                    {!! $about_us_services_section->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="testimonial-section-home2 pbmit-bg-color-blackish" data-cursor="white-color">
        <div class="container">
            <div class="row">
                <div class="col-7">
                     <div class="pbmit-animation-style1" style="color: white">
                                 <h2 style="color:#FFFFFF">{{$about_us_clients_slider->title}}</h2>
                            </div>
                 
                </div>
                <div class="col-5">
                    <div class="pbmit-ele-header-area"></div>
                </div>
            </div>
            @if ($testimonials->count())
                <div class="swiper-slider pbmit-element-testimonial-style-2 pbmit-element-service-style-" data-autoplay="false" data-dots="true" data-arrows="true" data-columns="1" data-margin="30" data-effect="slide">
                    <div class="swiper-wrapper">
                        @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <!-- Slide1 -->
                                <article class="pbmit-testimonial-style-2">
                                    <div class="pbminfotech-post-item d-flex align-items-center">
                                        <div class="pbminfotech-author-wrapper">
                                            <div class="pbminfotech-box-img">
                                                <div class="pbmit-featured-img-wrapper">
                                                    <div class="pbmit-featured-wrapper">
                                                        <x-curator-glider
                                                            :media="$testimonial->media_id"
                                                            class="img-fluid"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pbminfotech-box-author">
                                                <h3 class="pbminfotech-box-title">{{$testimonial->title}}</h3>
                                                <div class="pbminfotech-testimonial-detail">{{$testimonial->position}}</div>
                                            </div>
                                        </div>
                                        <div class="pbminfotech-box-content">
                                            <div class="pbminfotech-box-star-ratings">
                                                @for($i=0; $i<$testimonial->rate; $i++)
                                                    <i class="pbmit-base-icon-star pbmit-active"></i>
                                                @endfor
                                            </div>
                                            <div class="pbminfotech-testimonial-wrapper">
                                                <div class="pbminfotech-box-desc">
                                                    <blockquote class="pbminfotech-testimonial-text">
                                                        <div class="at-above-post-homepage addthis_tool"></div>
                                                        {!! $testimonial->description !!}
                                                        <div class="at-below-post-homepage addthis_tool"></div>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        @if ($about_us_clients_slider)
            <div class="client-section-home1">
                <div class="container-fluid">
                    <div class="swiper-slider marquee">
                        <div class="swiper-wrapper">
                            @foreach($about_us_clients_slider->slides as $slide)
                                <div class="swiper-slide">
                                    <article class="pbmit-client-style-1">
                                        <div class="pbmit-client-wrapper pbmit-client-with-hover-img">
                                            <h4 class="pbmit-hide">client 07</h4>
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
        @endif
        @if ($team_members->count())
            <section class="team-style-1  pbmit-bg-color-blackish"  data-cursor="white-color">
                <div class="pbmit-element-team-style-1">
                    <div class="container-fluid">
                        <div class="row g-0 hove-img">
                            @foreach($team_members as $team_member)
                                <div class="col-md-12 col-lg-4">
                                    <div class="pbmit-team-style-1">
                                        <div class="pbminfotech-post-item">
                                            <div class="pbmit-featured-img-wrapper">
                                                <div class="pbmit-featured-wrapper">
                                                    <x-curator-glider
                                                        :media="$team_member->image_id"
                                                        class="img-fluid"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row pbminfotech-team-content g-0">
                            @foreach($team_members as $team_member)
                                <div  class="col-md-12 col-lg-4">
                                    <div class="pbminfotech-box-content">
                                        <div class="pbminfotech-box-content-inner">
                                            <h3 class="pbmit-team-title">
                                                <a>{{$team_member->title}}</a>
                                            </h3>
                                            <div class="pbminfotech-team-position">
                                                <div class="pbminfotech-box-team-position">{{$team_member->position}}</div>
                                            </div>
                                            <div class="pbminfotech-social-box">
                                                <div class="pbminfotech-box-social-links">
                                                    <ul class="pbmit-social-links pbmit-team-social-links">
                                                        @if ($facebook = $team_member->facebook)
                                                            <li class="pbmit-social-li pbmit-social-facebook">
                                                                <a href="{{$facebook}}" title="Facebook" target="_blank">
                                                                    <span><i class="pbmit-base-icon-facebook-squared"></i></span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($twitter = $team_member->twitter)
                                                            <li class="pbmit-social-li pbmit-social-twitter">
                                                                <a href="{{$twitter}}" title="Twitter" target="_blank">
                                                                    <span><i class="pbmit-base-icon-twitter"></i></span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($instagram = $team_member->instagram)
                                                            <li class="pbmit-social-li pbmit-social-instagram">
                                                                <a href="{{$instagram}}" title="Instagram" target="_blank">
                                                                    <span><i class="pbmit-base-icon-instagram"></i></span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if ($youtube = $team_member->youtube)
                                                            <li class="pbmit-social-li pbmit-social-youtube">
                                                                <a href="{{$youtube}}" title="Youtube" target="_blank">
                                                                    <span><i class="pbmit-base-icon-youtube-play"></i></span>
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pbmit-featured-img-wrapper">
                                            <div class="pbmit-featured-wrapper">
                                                <x-curator-glider
                                                        :media="$team_member->image_id"
                                                        class="img-fluid"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </section>

@endsection