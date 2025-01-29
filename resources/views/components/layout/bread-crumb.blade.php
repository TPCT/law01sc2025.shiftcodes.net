<div class="pbmit-breadcrumb">
    <div class="pbmit-breadcrumb-inner">
        @foreach($bread_crumbs as $segment_url => $segment_text)
            @if ($loop->last)
                <span><span class="post-root post post-post current-item">{{$segment_text}}</span></span>
            @else
                <span><a title="" href="{{$segment_url}}" class="home"><span>{{$segment_text}}</span></a></span>
                <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
            @endif
        @endforeach
    </div>
</div>