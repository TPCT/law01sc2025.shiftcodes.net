(function ($) {
  "use strict";

  /*-------------------------------------
      Animation on scroll: Number rotator
  -------------------------------------*/
  $("[data-appear-animation]").each(function() {
      var self      = $(this);
      var animation = self.data("appear-animation");
      var delay     = (self.data("appear-animation-delay") ? self.data("appear-animation-delay") : 0);        

      if( $(window).width() > 959 ) { 
          self.html('0');
          self.waypoint(function(direction) {
              if( !self.hasClass('completed') ){
                  var from     = self.data('from');
                  var to       = self.data('to');
                  var interval = self.data('interval');
                  self.numinate({
                      format: '%counter%',
                      from: from,
                      to: to,
                      runningInterval: 2000,
                      stepUnit: interval,
                      onComplete: function(elem) {
                          self.addClass('completed');
                      }
                  });
              }
          }, { offset:'85%' });
      } else {
        self.html(self.data('to'));
      }
  });

  /*-------------------------------------
  Swiper Slider
  -------------------------------------*/
  var swiperslider = $(".swiper-slider");
  var x = 1;
  swiperslider.each(function () {  
             var carouselElement	= $(this);
             var header_area =  $(this).closest('section').find( '.pbmit-ele-header-area');
              var columns = $(this).data('columns');
              var loop = $(this).data('loop');
              var autoplay2 = $(this).data('autoplay');
              var autoplayspeed1 = $(this).data('autoplayspeed');
              var val_nav = $(this).data('arrows');
              var nav_arrow = $(this).data('arrows-class');                
              var val_dots = $(this).data('dots');
              var val_center = $(this).data('center');
              var style = $(this).data('effect');
              var loopSlide = null;
              var sl_speed = 300; 
              var c_counter = false;

              carouselElement.addClass( 'pbmit-element-viewtype-carousel-' + x );


              if( columns === 1 ){ 
                var responsive_items = [ /* 1199 : */ '1', /* 991 : */ '1', /* 767 : */ '1', /* 575 : */ '1', /* 0 : */ '1' ];
              } else if( columns === 2 ||  columns === 2.5 ){ 
                var responsive_items = [ /* 1199 : */ columns, /* 991 : */ '2', /* 767 : */ '2', /* 575 : */ '1', /* 0 : */ '1' ];
              } else if( columns === 3 ||  columns === 3.5 ){
                var responsive_items = [ /* 1199 : */ columns, /* 991 : */ '2', /* 767 : */ '2', /* 575 : */ '1', /* 0 : */ '1' ];
              } else if( columns === 4||  columns === 4.5 ){
                var responsive_items = [ /* 1199 : */ columns, /* 991 : */ '4', /* 767 : */ '4', /* 575 : */ '1', /* 0 : */ '1' ];
              } else if( columns === 5 ){
                var responsive_items = [ /* 1199 : */ '5', /* 991 : */ '2', /* 767 : */ '2', /* 575 : */ '1', /* 0 : */ '1' ];
              } else if( columns === 6 ){
                var responsive_items = [ /* 1199 : */ '6', /* 991 : */ '4', /* 767 : */ '1', /* 575 : */ '1', /* 0 : */ '1' ];
              } else {
                var responsive_items = [ /* 1199 : */ '3', /* 991 : */ '3', /* 767 : */ '1', /* 575 : */ '1', /* 0 : */ '1' ];
              }

              if (val_dots === true) {
                carouselElement.append('<div class="swiper-pagination swiper-pagination"></div>');
              }
              if ( jQuery(carouselElement).hasClass('pbmit-element-service-style-1') || jQuery(carouselElement).hasClass('pbmit-element-testimonial-style-2') ) {
                  c_counter = true;
                  var totalslide = jQuery(carouselElement).find('article:not(".swiper-slide-duplicate")').length;
                  var cal = Math.round((1 * 100) / totalslide); 
                  header_area.append('<div class="pbmit-fld-contents"><div class="pbmit-circle-outer" data-digit="' + cal + '" data-fill="#b8967e" data-emptyfill="#f6f6f6" data-before=""  data-thickness="2" data-size="100"><div class="pbmit-circle"><div class="pbmit-fid-inner"></div></div></div></div>');
                   
                  var elm = jQuery(carouselElement).closest('section').find( '.pbmit-circle');
                  pbmit_circle_progressbar(); 
                  setTimeout(function() { updatecircle(elm, 1, totalslide); }, 100);
              }

              if(val_nav === true){
                 
                if(!nav_arrow){
                  carouselElement.append( '<div class="swiper-buttons"></div>' );
                  carouselElement.find('.swiper-buttons').append( '<div class="swiper-button-next swiper-button-next-' + x + '"></div>' );
                  carouselElement.find('.swiper-buttons').append( '<div class="swiper-button-prev swiper-button-prev-' + x + '"></div>' );
                } else{             
                  $('.' + nav_arrow).append( '<div class="swiper-buttons"></div>' );
                  $('.' + nav_arrow).append( '<div class="swiper-button-next swiper-button-next-' + x + '"></div>' );
                  $('.' + nav_arrow).append( '<div class="swiper-button-prev swiper-button-prev-' + x + '"></div>' );
                }
              }

              var pagination_val = false;
              if (val_dots === true) {
                  pagination_val = {
                      el: '.swiper-pagination',
                      clickable: true,
                  };
              }
              var navigation_val = false;
              if(val_nav === true){
                navigation_val =  {
                  nextEl: '.swiper-button-next-' + x,
                  prevEl: '.swiper-button-prev-' + x,
                };
              }

              if(!style){
                style = "slide";
              }    
              
              var margin_val = 30;
              if( $(carouselElement).data('margin') !== '' || $(carouselElement).data('margin') === '0'){
                margin_val = $(carouselElement).data('margin');  
              } 
            
              if(carouselElement.hasClass('marquee')){ 
                var reverse_direction = $(this).data('reverse');
                if (!reverse_direction) reverse_direction = false;
                 var swiper2 = new Swiper( '.pbmit-element-viewtype-carousel-' + x, { 
                   spaceBetween: 0,
                   centeredSlides: true,
                   speed: 5000,
                   autoplay: {
                       delay: 1,
                       disableOnInteraction: true,
                       reverseDirection: reverse_direction,
                   },
                   loop: true,
                   slidesPerView: 'auto',
                   allowTouchMove: false,
                   disableOnInteraction: true
               }); 

              
             } else{          
              var numOfSlides;         
            var swiper = new Swiper( '.pbmit-element-viewtype-carousel-' + x, { 
                loop: loop, 
                navigation: navigation_val,
                pagination: pagination_val,
                slidesPerView: columns,
                spaceBetween: margin_val,
                loopedSlides: loopSlide, 
                effect: style,
                speed: sl_speed, 
                grabCursor: false,
                centeredSlides: val_center,
                breakpoints		  : {
                  1199 : {
                    slidesPerView	: responsive_items[0],
                  },
                  991	 : {					
                    slidesPerView	: responsive_items[1],
                  },
                  767	 : {
                    slidesPerView	: responsive_items[2],
                  },
                  575	 : {
                    slidesPerView	: responsive_items[3],
                  },
                  0	 : {
                    slidesPerView	: responsive_items[4],
                  }
                             
              },
              on: {
                slideChange: function(swiper) {
                    if (c_counter) { 
                        var elm = jQuery(carouselElement).closest('section').find( '.pbmit-circle');
                        var current = swiper.realIndex + 1;
                        updatecircle(elm, current, numOfSlides);
                    }
                },
                beforeInit: function(){
                    numOfSlides = jQuery('.pbmit-element-viewtype-carousel-' + x + ' .swiper-slide').length;
                }
              }
            }); 
            if (jQuery('.pbmit-element-viewtype-carousel-' + x).hasClass('pbmit-element-testimonial-style-1') || jQuery('.pbmit-element-viewtype-carousel-' + x).hasClass('pbmit-element-testimonial-style-2')) {
                var pbmit_var = jQuery('.pbmit-element-viewtype-carousel-' + x);                 
                pbmit_var.find('.swiper-button-next').attr('data-cursor-text', '<i class="pbmit-base-icon-arrow-right"></i>');
                pbmit_var.find('.swiper-button-prev').attr('data-cursor-text', '<i class="pbmit-base-icon-arrow-left"></i>');
            }

          }
            x = x + 1;             
        });
    function updatecircle(elm, cr, tl) {
        var cal = getpercentage(tl, cr, elm); 
        var short_digit = cal / 100;
        elm.circleProgress('value', short_digit);
    }

  

/* ====================================== */
/* Circle Progress bar
/* ====================================== */
 function pbmit_circle_progressbar() {

  jQuery('.pbmit-circle-outer').each(function() {

      var this_circle = jQuery(this);

      // Circle settings
      var emptyFill_val = "rgba(0, 0, 0, 0)";
      var thickness_val = 10;
      var fill_val = this_circle.data('fill');
      var size_val = 110;

      if (typeof this_circle.data('emptyfill') !== 'undefined' && this_circle.data('emptyfill') != '') {
          emptyFill_val = this_circle.data('emptyfill');
      }
      if (typeof this_circle.data('thickness') !== 'undefined' && this_circle.data('thickness') != '') {
          thickness_val = this_circle.data('thickness');
      }
      if (typeof this_circle.data('size') !== 'undefined' && this_circle.data('size') != '') {
          size_val = this_circle.data('size');
      }
      if (typeof this_circle.data('filltype') !== 'undefined' && this_circle.data('filltype') == 'gradient') {
          fill_val = { gradient: [this_circle.data('gradient1'), this_circle.data('gradient2')], gradientAngle: Math.PI / 4 };
      }

      if (typeof jQuery.fn.circleProgress == "function") {
          var digit = this_circle.data('digit');
          var before = this_circle.data('before');
          var after = this_circle.data('after');
          var digit = Number(digit);
          var short_digit = (digit / 100);

          jQuery('.pbmit-circle', this_circle).circleProgress({
              value: 0,
              size: size_val,
              startAngle: -Math.PI / 4 * 2,
              thickness: thickness_val,
              emptyFill: emptyFill_val,
              fill: fill_val
          }).on('circle-animation-progress', function(event, progress, stepValue) { // Rotate number when animating
              this_circle.find('.pbmit-circle-number').html(before + Math.round(stepValue * 100) + after);
          });
      }

      this_circle.waypoint(function(direction) {
          if (!this_circle.hasClass('completed')) {
              // Re draw when view
              if (typeof jQuery.fn.circleProgress == "function") {
                  jQuery('.pbmit-circle', this_circle).circleProgress({ value: short_digit });
              };
              this_circle.addClass('completed');
          }
      }, { offset: '85%' });

  });
} 

  /*-------------------------------------
  ProgressBar
  -------------------------------------*/
  AOS.init({
    once: true,
  });

   /*-------------------------------------
  Scroll To Top
  -------------------------------------*/
  jQuery('body').append('<a href="#" class="scroll-to-top"><i class="pbmit-base-icon-up-open-big"></i></a>');    
  var btn = jQuery('.scroll-to-top');
  jQuery(window).scroll(function() {
      if (jQuery(window).scrollTop() > 300) {
          btn.addClass('show');
      } else {
          btn.removeClass('show');
      }
  });
  btn.on('click', function(e) {
      e.preventDefault();
      jQuery('html, body').animate({ scrollTop: 0 }, '300');
  });

  /*-------------------------------------
  Header Search Form
  -------------------------------------*/
  $( ".pbmit-header-search-btn a" ).on('click', function() {     
    $(".pbmit-search-overlay").addClass('st-show');
    $("body").addClass('st-prevent-scroll');            
    return false;
  });   
  $( ".pbmit-icon-close" ).on('click', function() {
        $(".pbmit-search-overlay").removeClass('st-show');
      $("body").removeClass('st-prevent-scroll');            
      return false;
  }); 
  $('.pbmit-site-searchform').on('click', function(event){
    event.stopPropagation();
  });
  
  /*-------------------------------------
  Count Down
  -------------------------------------*/ 

  if( $('#clock').length>0 ){
    $('#clock').countdown('2024/10/10', function(event) {
      $(this).html(event.strftime(''
      + '<div class="conut-time"><span class="time_left">86</span><span class="time_description">Day%!d </span></div>'
      + '<div class="conut-time"><span class="time_left">05</span><span class="time_description"> Hours </span></div> '
      + '<div class="conut-time"><span class="time_left">33</span><span class="time_description"> Minutes </span></div>'
      + '<div class="conut-time"><span class="time_left">%S</span><span class="time_description"> Seconds </span></div>'
      ));
    });
  }

  /*-------------------------------------
  Count Down
  -------------------------------------*/ 
  $( ".active-onhover .pbmit-static-box-style-1:nth-child(2)" ).addClass('pbmit-mihbox-hover-active');
  
    $( ".active-onhover .pbmit-static-box-style-1" ).mouseover(function() {
      var main_row = $( this ).closest( '.active-onhover' );
      $('.pbmit-static-box-style-1', main_row).removeClass('pbmit-mihbox-hover-active'); 
      $(this).addClass('pbmit-mihbox-hover-active');
    }).mouseout(function() {
      var main_row = $( this ).closest( '.active-onhover' );
      $('.pbmit-static-box-style-1', main_row).removeClass('pbmit-mihbox-hover-active');
      $('.pbmit-static-box-style-1:nth-child(2)', main_row).addClass('pbmit-mihbox-hover-active');
     
    });

  /*-------------------------------------
    tooltip
  -------------------------------------*/
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    
  /*-------------------------------------
    Mobile Menu
  -------------------------------------*/     
  $('.navbar-toggler,.closepanel').on('click', function () { 
    jQuery("header").toggleClass("active");
  }); 

  /*-------------------------------------
  Magnific Popup
  -------------------------------------*/
  var i_type = 'image';
  $('.pbmin-lightbox-video, .pbmin-lightbox-video a, a.pbmit-lightbox').each(function(){
      if( $(this).hasClass('pbmin-lightbox-video')){ 
        i_type = 'iframe';
      } else {
        i_type = 'image';
      }  
      $(this).magnificPopup({type:i_type});
  });   

  /*-------------------------------------
   Accordion
  -------------------------------------*/

  $('.accordion .accordion-item').on('click', function () { 
    var e = $(this);  
    $(this).parent().find('.accordion-item').removeClass('active');        
    if(!$(this).find('.accordion-button').hasClass('collapsed')){
      $(this).addClass('active');
    }  
  }); 

  /*-------------------------------------
    Add plus icon in menu
    -------------------------------------*/
  $( ".main-menu ul.navigation li.dropdown").append( "<span class='righticon'><i class='ti-angle-down'></i></span>" );
  
  /*-------------------------------------
  Responsive Menu
  -------------------------------------*/ 
  $('.main-menu ul.navigation li.dropdown .righticon').on('click', function() {
         $(this).siblings().toggleClass('open');
         $(this).find('i').toggleClass('ti-angle-down ti-angle-up');
         return false;
  });  

  /*-------------------------------------
  Circle Progressbar
  -------------------------------------*/
  $('.pbmit-circle-outer').each(function() {

    var this_circle = $(this);

    // Circle settings
    var emptyFill_val = "rgba(0, 0, 0, 0)";
    var thickness_val = 10;
    var fill_val = this_circle.data('fill');
    var size_val = 110;

    if (typeof this_circle.data('emptyfill') !== 'undefined' && this_circle.data('emptyfill') !== '') {
        emptyFill_val = this_circle.data('emptyfill');
    }
    if (typeof this_circle.data('thickness') !== 'undefined' && this_circle.data('thickness') !== '') {
        thickness_val = this_circle.data('thickness');
    }
    if (typeof this_circle.data('size') !== 'undefined' && this_circle.data('size') !== '') {
        size_val = this_circle.data('size');
    }
    if (typeof this_circle.data('filltype') !== 'undefined' && this_circle.data('filltype') === 'gradient') {
        fill_val = { gradient: [this_circle.data('gradient1'), this_circle.data('gradient2')], gradientAngle: Math.PI / 4 };
    }

    if (typeof $.fn.circleProgress === "function") {
        var digit = this_circle.data('digit');
        var before = this_circle.data('before');
        var after = this_circle.data('after');
        var digit = Number(digit);
        var short_digit = (digit / 100);

        $('.pbmit-circle', this_circle).circleProgress({
            value: 0,
            size: size_val,
            startAngle: -Math.PI / 4 * 2,
            thickness: thickness_val,
            emptyFill: emptyFill_val,
            fill: fill_val
        }).on('circle-animation-progress', function(event, progress, stepValue) { // Rotate number when animating
            this_circle.find('.pbmit-circle-number').html(before + Math.round(stepValue * 100) + after);
        });
    }
    
    this_circle.waypoint(function(direction) {
        if (!this_circle.hasClass('completed')) {
            // Redraw when view
            if (typeof $.fn.circleProgress === "function") {
                $('.pbmit-circle', this_circle).circleProgress({ value: short_digit });
            };
            this_circle.addClass('completed');
        }
    }, { offset: '85%' });

});

})($);

   /*-------------------------------------
    Contact form validator
    -------------------------------------*/
    if ( $.isFunction($.fn.validate) ) {
      $("#contact-form").validate(); 
    }


    /*-------------------------------------
     Send email via Ajax
   Make sure you configure send.php file 
     -------------------------------------*/
    $("#contact-form").submit(function(){
 
   if( $("#contact-form .doing-via-ajax").length == 0 ){
     $("#contact-form").prepend('<input class="doing-via-ajax" type="hidden" name="doing-via-ajax" value="yes" />');;
   }
 
   if( $("#contact-form").valid() ){  // check if form is valid
 
     $(".contact-form .message-status").html('');
     $('.form-btn-loader').removeClass('d-none');
     $('.contact-form button.pbmit-btn span').hide();
     $('.contact-form button.pbmit-btn').attr("disabled", "disabled");
 
     $.ajax( {
       type: "POST",
       url: "send.php",
       data:$('#contact-form').serialize(),
       success: function(cevap) {
         $('.form-btn-loader').addClass('d-none');
         $('.contact-form button.pbmit-btn span').show();
         $(".contact-form button.pbmit-btn").removeAttr("disabled");
         $(".contact-form .message-status").html(cevap);
       }
     });
     
   }
 
   return false;
 
   });