@extends('layouts.main')

@section('title', $service->title)

@section('content')
    <x-layout.header-image :title="__('site.Our Services')" :breadcrumbs="[
        route('site.index') => __('Site.Home'),
        route('services.index') => __('site.Our Services'),
        route('services.show', ['service' => $service]) => $service->title
    ]"/>

    <section class="section-lgx">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 service-left-col order-2 order-lg-1 sidebar">
                    <aside class="service-sidebar">
                        <aside class="widget post-list">
                            <div class="all-post-list">
                                <h2 class="widget-title">@lang('site.Our Services')</h2>
                                <ul>
                                    @foreach($services as $loop_service)
                                        @if ($service->id == $loop_service->id)
                                            <li class="post-active"><a href="#"> {{$loop_service->title}} </a></li>
                                        @else
                                            <li><a href="{{route('services.show', ['service' => $loop_service])}}"> {{$loop_service->title}}  </a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </aside>

                        <aside class="widget pbmit-htmlbgcolor">
                            <h2 class="widget-title">@lang('site.Company Profile')</h2>
                            <div class="textwidget custom-html-widget">
                                <div class="download">
                                    <div class="item-download">
                                        <a href="{{\Awcodes\Curator\Models\Media::find(app(\App\Settings\Site::class)->translate('company_profile'))?->url}}" target="_blank" rel="noopener noreferrer">
                                            <i class="pbminfotech-base-icons pbmit-base-icon-pdf"></i> @lang('site.Download PDF')
                                            <i class="pbminfotech-base-icons pbmit-righticon  pbmit-base-icon-download-solid"></i>
                                        </a>
                                    </div>
                                    <div class="item-download d-none">
                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                            <i class="pbminfotech-base-icons pbmit-base-icon-pdf"></i> @lang('site.Download PDF')
                                            <i class="pbminfotech-base-icons pbmit-righticon  pbmit-base-icon-download-solid"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </aside>
                </div>
                <div class="col-lg-8 service-right-col order-1">
                    <x-curator-glider
                        :media="$service->image_id"
                    />
                    <div class="service-details">
                        {!! $service->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection