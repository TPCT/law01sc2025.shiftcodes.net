<div class="pbmit-footer-section">
    <div class="container">
        <div class="pbmit-footer-text-inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="pbmit-footer-copyright-text-area">
                        @lang('site.Copyright') © {{date('Y')}}
                        <a href="https://shiftcodes.net">@lang('site.ShiftCodes')</a>, @lang('site.All Rights Reserved').
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" pbmit-footer-menu-area">
                        <div class="menu-copyright-menu-container">
                            <ul class="pbmit-footer-menu">
                                @foreach($menu->links as $child)
                                    <li class="menu-item">
                                        <a href="{{$child->link}}">{{$child->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>