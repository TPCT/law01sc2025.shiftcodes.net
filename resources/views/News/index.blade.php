@extends('layouts.main')

@section('title', __("site.Blogs"))
@section('class', 'blog-grid')

@section('content')
    <x-layout.header-image :title="__('site.Our Services')" :breadcrumbs="[
        route('site.index') => __('Site.Home'),
        route('blogs.index') => __('site.Blogs')
    ]"/>
    <section class="section-lg blog-section-home4">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-sm-12 col-md-4">
                        <article class="pbmit-blog-style-1">
                            <div class="post-item">
                                <div class="pbmit-featured-container">
                                    <div class="pbmit-featured-img-wrapper">
                                        <div class="pbmit-featured-wrapper">
                                            <x-curator-glider
                                                    :media="$blog->image_id"
                                                    class="img-fluid"
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="pbminfotech-box-content">
                                    <div class="pbmit-meta-container">
                                            <span class="pbmit-date-wrapper pbmit-meta-line">
                                                <span class="pbmit-post-date">{{\Illuminate\Support\Carbon::parse($blog->published_at)->format('M . d . Y')}}</span>
                                            </span>
                                            <span class="pbmit-date-wrapper pbmit-meta-line">
                                                <span class="pbmit-post-date">{{$blog->category->title}}</span>
                                            </span>
                                    </div>
                                    <div class="pbmit-box-content-wrapper">
                                        <h3 class="pbmit-post-title">
                                            <a href="{{route('blogs.show', ['blog' => $blog])}}">{{$blog->title}}</a>
                                        </h3>
                                        <div class="pbminfotech-box-desc-text">
                                            {!! $blog->description !!}
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