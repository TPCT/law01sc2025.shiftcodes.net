<div class="pbmit-title-bar-wrapper {{$class}}" style="background-image: url('{{asset($image)}}') !important;">
    <div class="container">
        <div class="pbmit-title-bar-content d-flex justfy-content-center aline-items-center">
            <div class="pbmit-title-bar-content-inner">
                <div class="pbmit-tbar">
                    <div class="pbmit-tbar-inner container">
                        <h1 class="pbmit-tbar-title">{{$title}}</h1>
						
						<div style="display: flex; justify-content: center; align-items: center; height: 100%; width: 100% ">

  								  <a id="custom-btn" href="" class="custom-btn">Contact us</a>
						</div>



                    </div>
 
                </div>
                <div class="pbmit-breadcrumb">
                    <div class="pbmit-breadcrumb-inner">
                        @foreach($breadcrumbs as $segment_url => $segment_text)
                            @if ($loop->last)
                                <span><span class="post-root post post-post current-item">{{$segment_text}}</span></span>
                            @else
                                <span><a title="" href="{{$segment_url}}" class="home"><span>{{$segment_text}}</span></a></span>
                                <span class="sep"><i class="pbmit-base-icon-right-small"></i></span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>