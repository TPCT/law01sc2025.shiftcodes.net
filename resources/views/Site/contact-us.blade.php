@extends('layouts.main')

@section('title', __('site.Contact Us'))

@section('content')
    <x-layout.header-image  :title="__('site.Contact Us')" :breadcrumbs="[
        route('site.index') => __('Site.Home'),
        route('site.contact-us') => __('site.Contact us')
    ]"/>

    <section class="contact-section-main">
        <div class="container">
            <div class="row g-0">
                @if ($phone)
                    <div class="col-xl-4 col-md-12">
                        <div class="contacticon-box">
                            <p>@lang('site.Lets Talk')</p>
                            <h2>{{$phone}}</h2>
                        </div>
                    </div>
                @endif
                @if ($email)
                        <div class="col-xl-4 col-md-12">
                            <div class="contacticon-box  icon-box-one">
                                <div>
                                    <p>@lang('site.EMAIL')</p>
                                    <h2><a href="mailto:{{$email}}">{{$email}}</a></h2>
                                </div>
                            </div>
                        </div>
                @endif
                @if ($address)
                    <div class="col-xl-4 col-md-12">
                        <div class="contacticon-box icon-box-two">
                            <p>@lang('site.ADDRESS')</p>
                            <h2>{{$address}}</h2>
                        </div>
                    </div>
                @endif
            </div>

            <section class="section-lgb contact-section">
                <div class="container">
                    <div class="row g-0" style="align-items: center">
                        @if ($section)
                            <div class="col-md-5" >
                                <div class="pbmit-heading animation-style2">
                                    <h2 class="pbmit-title">{{$section->title}}</h2>
                                </div>
                                {!! $section->description !!}
                            </div>
                        @endif
                        <div class="col-md-7">
                            <div class="pbmit-sticky pbmit-animation-style2">
                                @if($success_message = session('success'))
                                    <div class="d-flex justify-content-center w-100">
                                        <div class="my-3 alert alert-success w-100 text-center">
                                            <span class="">{{$success_message}}</span>
                                        </div>
                                    </div>
                                @endif
                                <form class="contact-form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 d-flex flex-column">
                                            <input type="text" class="form-control" placeholder="@lang('site.Name*')" value="{{old('name')}}" name="name" required>
                                            @error('name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 d-flex flex-column">
                                            <input type="text" class="form-control" placeholder="@lang('site.Company Name')" value="{{old('company_name')}}" name="company_name">
                                            @error('company_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 d-flex flex-column mb-2">
                                            <input type="email" class="form-control" placeholder="@lang('site.Email')" value="{{old('email')}}" name="email" required>
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 d-flex flex-column mb-2">
                                            <input type="text" class="form-control" placeholder="@lang('site.Phone Number')" value="{{old('phone')}}" name="phone">
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 d-flex flex-column mb-2">
                                            <input type="text" class="form-control" placeholder="@lang('site.Case Name*')" value="{{old('case_name')}}" name="case_name" required>
                                            @error('case_name')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 d-flex flex-column mb-2">
                                            <textarea name="case_description" class="form-control" placeholder="@lang('site.Case Description')" required>{{old('case_description')}}</textarea>
                                            @error('case_description')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 d-flex flex-column mb-2">
                                            <input type="file" name="attachment" class="mb-3" placeholder="@lang('site.Attachments')" value="{{old('attachment')}}">
                                            @error('attachment')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 d-flex flex-column">
                                            <button type="submit" class="btn btn-success">
                                                <i class="form-btn-loader fa fa-circle-o-notch fa-spin fa-fw margin-bottom d-none"></i>
                                                @lang('site.Send Message')
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @if ($map_link = app(\App\Settings\Site::class)->map_link)
               <section class="contact-section-map">
                    <iframe src="{{$map_link}}" title="jersery city new york" aria-label="jersery city new york"></iframe>
               </section>
            @endif
        </div>
    </section>
@endsection