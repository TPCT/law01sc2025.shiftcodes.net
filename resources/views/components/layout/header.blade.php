<header class="site-header @yield('header-class', 'header-style-1')">
    <div class="site-header-menu">
        <div class="container-fluid g-0">
            <div class="row g-0">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-between header-content">
                            <div class="site-branding pbmit-logo-area">
                                <h1 class="site-title">
                                    <a href="{{route('site.index')}}">
                                        <x-curator-glider
                                            :media="app(\App\Settings\Site::class)->translate('logo')"
                                            class="logo-img"
                                        ></x-curator-glider>
                                    </a>
                                </h1>
                            </div>
                            <div class="site-navigation">
                                <nav class="main-menu navbar-expand-xl navbar-light">
                                    <div class="navbar-header">
                                        <button class="navbar-toggler" type="button">
                                            <i class="pbmit-base-icon-menu-1"></i>
                                        </button>
                                    </div>
                                    <div class="pbmit-mobile-menu-bg"></div>
                                    <div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
                                        <div class="pbmit-menu-wrap">
											<span class="closepanel">
												<i class="pbmit-base-icon-close-circular-button-symbol"></i>
											</span>
                                            <ul class="navigation clearfix">
                                                @foreach($menu->links as $link)
                                                    <li class="{{\App\Helpers\Utilities::getActiveLink($link)}}">
                                                        <a href="{{$link->link}}">{{$link->title}}</a>
                                                    </li>
                                                @endforeach
                                                <x-layout.language-switcher></x-layout.language-switcher>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
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


    @yield('header_content')
</header>