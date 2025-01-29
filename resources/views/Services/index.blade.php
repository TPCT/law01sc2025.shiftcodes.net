@extends('layouts.main')

@section('title', __("site.Our Services"))
@section('class', 'blog-grid')

@section('content')
    <x-layout.header-image :title="__('site.Our Services')" :breadcrumbs="[
        route('site.index') => __('Site.Home'),
        route('services.index') => __('site.Our Services')
    ]"/>
    <section class="section-lg blog-section-home4">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-sm-12 col-md-4">
                        <article class="pbmit-blog-style-1">
                            <div class="post-item">
                                <div class="pbmit-featured-container">
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <x-curator-glider
                                                    :media="$service->image_id"
                                                    class="img-fluid"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="pbminfotech-box-content">
                                    <div class="pbmit-meta-container">
                                            <span class="pbmit-date-wrapper pbmit-meta-line">
                                            <span class="pbmit-post-date">{{\Illuminate\Support\Carbon::parse($service->published_at)->format('M . d . Y')}}</span>
                                            </span>
                                    </div>
                                    <div class="pbmit-box-content-wrapper">
                                        <h3 class="pbmit-post-title">
                                            <a href="{{route('services.show', ['service' => $service])}}">{{$service->title}}</a>
                                        </h3>
                                        <div class="pbminfotech-box-desc-text">
                                            {!! $service->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection