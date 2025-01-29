@extends('layouts.main')

@section('title', $blog->title)

@section('content')
    <x-layout.header-image :title="__('site.Blogs')" :breadcrumbs="[
        route('site.index') => __('Site.Home'),
        route('blogs.index') => __('site.Blogs'),
        route('blogs.show', ['blog' => $blog]) => $blog->title
    ]"/>

    <section class="section-lgx">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="row">
                        <div class="col-md-12">
                            <article class="post blog-details">
                                <div class="post-thumbnail">
                                    <div class="pbmit-featured-container">
                                        <div class="pbmit-featured-wrapper">
                                            <x-curator-glider
                                                :media="$blog->image_id"
                                                class="w-100 img-fluid"
                                            />
                                        </div>
                                        <div class="pbmit-meta-date-wrapper">
                                           <span class="pbmit-meta pbmit-date">
                                               <a href="{{route('blogs.index', ['date' => \Carbon\Carbon::parse($blog->published_at)->format('Y-m-d')])}}" rel="bookmark">{{\Carbon\Carbon::parse($blog->published_at)->format('M d, Y')}}</a>
                                           </span>
                                            <span class="pbmit-meta pbmit-meta-line">
                                              <a href="{{route('blogs.index', ['category' => $blog->category->title])}}" rel="category tag">{{$blog->category->title}}</a>
                                           </span>
                                           <span>
                                                <a href="{{route('blogs.index', ['author' => $blog->author->name])}}" rel="Posted by {{$blog->author->name}}">{{$blog->author->name}}</a>
                                           </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="post-content">
                                    {!! $blog->content !!}
                                </div>
                            </article>

                            <nav class="navigation post-navigation" aria-label="Posts">
                                <div class="nav-links">
                                    <div class="nav-previous">
                                        @if ($prev_post)
                                            <a href="{{route('blogs.show', ['blog' => $prev_post])}}" rel="prev">
                                              <span class="pbmit-post-nav-icon">
                                                 <i class="pbmit-base-icon-arrow-left"></i>
                                                 <span class="pbmit-post-nav-head">@lang('site.Previous Post')</span>
                                              </span>
                                                    <span class="pbmit-post-nav-wrapper">
                                                 <span class="pbmit-post-nav nav-title">{{$prev_post->title}}</span>
                                              </span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="nav-next">
                                        @if ($next_post)
                                            <a href="{{route('blogs.show', ['blog' => $next_post])}}" rel="next">
                                              <span class="pbmit-post-nav-icon">
                                                 <span class="pbmit-post-nav-head">@lang('site.Next Post') </span>
                                                 <i class="pbmit-base-icon-arrow-right"></i>
                                              </span>
                                                    <span class="pbmit-post-nav-wrapper">
                                                 <span class="pbmit-post-nav nav-title">{{$next_post->title}}</span>
                                              </span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </nav>


                        </div>

                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
@endsection