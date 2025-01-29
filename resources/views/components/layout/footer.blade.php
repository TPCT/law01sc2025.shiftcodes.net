<footer class="footer site-footer">
    <div class="footer-wrap pbmit-footer-big-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pbmit-footer-logo">
                        <x-curator-glider
                                :media="app(\App\Settings\Site::class)->translate('footer_logo')"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pbmit-footer-widget-area">
        <div class="container">
            <div class="row">
                    @foreach($menu->links as $child)
                        <div class="col-md-6 col-lg-2">
                            <div class="widget pbmit-two-column-menu">
                                <h2 class="widget-title">{{$child->title}}</h2>
                                <div class="textwidget">
                                    <ul>
                                        @foreach($child->children as $grandson)
                                            <li><a href="{{$grandson->link}}">{{$grandson->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                <div class="col-md-6 col-lg-3">
                    <div class="widget">
                        <h3 class="widget-title">@lang('site.Contact')</h3>
                        <div class="pbmit-contact-widget-lines">
                            @if ($email = app(\App\Settings\Site::class)->email)
                                <div class="pbmit-contact-widget-line widget-address"><a href="mailto:{{$email}}">{{$email}}</a></div>
                            @endif
                            @if($address = app(\App\Settings\Site::class)->translate('address'))
                                    <div class="pbmit-contact-widget-line widget-address"><a href="{{app(\App\Settings\Site::class)->address_map_link}}">{{$address}}</a></div>
                            @endif
                            @if ($phone = app(\App\Settings\Site::class)->phone)
                                    <div class="pbmit-contact-widget-line widget-phone">
                                        <a href="tel:{{$phone}}">{{$phone}}</a>
                                    </div>
                            @endif
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    
                        <div class="widget">
                            <div class="pbmit-right-box">
                                <div class="menu-right-box d-flex align-items-center">
                                    <div class="pbmit-button">
                                        <a href="{{route('site.contact-us')}}" class=" pbmit-btn">
                                            <span class="pbmit-header-button-text-1">@lang('site.Free consultant')</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <x-layout.copyright-menu></x-layout.copyright-menu>
</footer>