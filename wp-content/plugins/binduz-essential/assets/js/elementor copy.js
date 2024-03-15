( function( $ ) {
 
    
    /*--------------------------------------------------------
    / Service Active slick slider 
    /----------------------------------------------------------*/
      var Binduz_Er_Post_Slider = function( $scope, $ ) {
    
          var $container = $scope.find('.binduz-er-featured-slider-item');
       
         if($container.length){
          
              var $slider_controls = $container.data('slide-controls');
              var autoplay         = Boolean($slider_controls.autoplay);
              var autoplaySpeed    = parseInt( $slider_controls.autoplaySpeed );
              var slide_speed      = parseInt($slider_controls.slide_speed) ;
              var show_nav         = Boolean( $slider_controls.show_nav );
              var slidesToShow     = parseInt($slider_controls.slidesToShow);
              var right_icon       = $slider_controls.right_icon;
              var left_icon        = $slider_controls.left_icon;

          
              $container.slick({
                dots          : false,
                infinite      : true,
                autoplay      : autoplay,
                autoplaySpeed : autoplaySpeed,
                arrows        : show_nav,
                prevArrow     : '<span class="prev"><i class="'+left_icon+'"></i></span>',
                nextArrow     : '<span class="next"><i class="'+right_icon+'"></i></span>',
                speed         : slide_speed,
                slidesToShow  : slidesToShow,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1201,
                        settings: {
                            slidesToShow: 1,
                        }
                },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                        }
                },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                        }
                }
              ]
            }); 
         } 
         //===== Testimonial Content Slide slick slider
         var $slider_box            = $scope.find('.binduz-er-news-slider-box');
         if($slider_box.length){
         
              var $slider_controls = $slider_box.data('slide-controls');
              var autoplay      = Boolean($slider_controls.autoplay);
              var autoplaySpeed = parseInt( $slider_controls.autoplaySpeed );
              var slide_speed   = parseInt($slider_controls.slide_speed) ;
              var show_nav      = Boolean( $slider_controls.show_nav );
              var slidesToShow  = parseInt($slider_controls.slidesToShow);
              var right_icon  = $slider_controls.right_icon;
              var left_icon  = $slider_controls.left_icon;

              var news_slider1 = jQuery('.binduz-er-news-slider-item');
              news_slider1.slick({
                  slidesToShow: slidesToShow,
                  slidesToScroll: 1,
                  speed         : slide_speed,
                  slidesToShow  : slidesToShow,
                  autoplay      : autoplay,
                  autoplaySpeed : autoplaySpeed,
                  arrows: show_nav,
                  prevArrow: '<span class="prev"><i class="'+left_icon+'"></i></span>',
                  nextArrow: '<span class="next"><i class="'+right_icon+'"></i></span>',
                  fade: true,
                  asNavFor: '.binduz-er-news-slider-content-slider'
              });
              var news_slider2 = jQuery('.binduz-er-news-slider-content-slider');
              news_slider2.slick({
                  slidesToShow: slidesToShow,
                  slidesToScroll: 1,
                  asNavFor: '.binduz-er-news-slider-item',
                  dots: false,
                  centerMode: true,
                  arrows: false,
                  prevArrow: '<span class="prev"><i class="'+left_icon+'"></i> Prev</span>',
                  nextArrow: '<span class="next">Next <i class="'+right_icon+'"></i></span>',
                  centerPadding: "0",
                  focusOnSelect: true,
      
              });
         }

             //===== Service Active slick slider        
        var $most_viewed_box            = $scope.find('.binduz-er-news-viewed-most-slide');

        if($most_viewed_box.length){

              var $slider_controlsbox = $most_viewed_box.data('slide-controls');
              var autoplay            = Boolean($slider_controlsbox.autoplay);
              var autoplaySpeed       = parseInt( $slider_controlsbox.autoplaySpeed );
              var slide_speed         = parseInt($slider_controlsbox.slide_speed) ;
              var show_nav            = Boolean( $slider_controlsbox.show_nav );
              var slidesToShow        = parseInt($slider_controlsbox.slidesToShow);
              var right_icon          = $slider_controlsbox.right_icon;
              var left_icon           = $slider_controlsbox.left_icon;
           
              $most_viewed_box.slick({
                dots: false,
                infinite: true,
                autoplay: autoplay,
                autoplaySpeed: autoplaySpeed,
                arrows: show_nav,
                prevArrow: '<span class="prev"><i class="'+left_icon+'"></i></span>',
                nextArrow: '<span class="next"><i class="'+right_icon+'"></i></span>',
                speed: slide_speed,
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1201,
                        settings: {
                            slidesToShow: slidesToShow,
                            arrows: false,
                        }
                }
              ]

            });
        }

        //===== Service Active slick slider        
        var $topbar_headline = $scope.find('.binduz-er-news-slider-2-item');

        if($topbar_headline.length){
                  
          var $slider_csheadline = $topbar_headline.data('slide-controls');
          
          var autoplay            = Boolean($slider_csheadline.autoplay);
          var autoplaySpeed       = parseInt( $slider_csheadline.autoplaySpeed );
          var slide_speed         = parseInt($slider_csheadline.slide_speed) ;
          var show_nav            = Boolean( $slider_csheadline.show_nav );
          var slidesToShow        = parseInt($slider_csheadline.slidesToShow);
          var slide_padding        = parseInt($slider_csheadline.slide_padding);
          var right_icon          = $slider_csheadline.right_icon;
          var left_icon           = $slider_csheadline.left_icon;

          $topbar_headline.slick({
              dots          : false,
              infinite      : true,
              autoplay      : autoplay,
              autoplaySpeed : autoplaySpeed,
              arrows        : show_nav,
              prevArrow     : '<span class="prev"><i class="'+left_icon+'"></i></span>',
              nextArrow     : '<span class="next"><i class="'+right_icon+'></i></span>',
              speed         : slide_speed,
              slidesToShow  : slidesToShow,
              slidesToScroll: 1,
              centerMode    : true,
              centerPadding : slide_padding+'PX',
              responsive: [
                  {
                      breakpoint: 1201,
                      settings: {
                          arrows: false,
                          slidesToShow: 2,
                      }
              },
                  {
                      breakpoint: 992,
                      settings: {
                          arrows: false,
                          slidesToShow: 2,
                      }
              },
                  {
                      breakpoint: 768,
                      settings: {
                          arrows: false,
                          slidesToShow: 1,
                          centerPadding: "30px",
                      }
              },
                  {
                      breakpoint: 576,
                      settings: {
                          arrows: false,
                          slidesToShow: 1,
                          centerPadding: "0px",
                      }
              },
            ]

          });
    
        }

         
        //===== Service Active slick slider        
        var $featured_slider = $scope.find('.binduz-er-featured-slider-2');
        if($featured_slider.length){

          var $slider_csheadline = $featured_slider.data('slide-controls');
          var autoplay            = Boolean($slider_csheadline.autoplay);
          var autoplaySpeed       = parseInt( $slider_csheadline.autoplaySpeed );
          var slide_speed         = parseInt($slider_csheadline.slide_speed) ;
          var show_nav            = Boolean( $slider_csheadline.show_nav );
          var slidesToShow        = parseInt($slider_csheadline.slidesToShow);
          var slide_padding        = parseInt($slider_csheadline.slide_padding);
          var right_icon          = $slider_csheadline.right_icon;
          var left_icon           = $slider_csheadline.left_icon;

            $featured_slider.slick({
              dots: false,
              infinite: true,
              autoplay: autoplay,
              autoplaySpeed: autoplaySpeed,
              arrows: show_nav,
              prevArrow: '<span class="prev"><i class="'+left_icon+'"></i></span>',
              nextArrow: '<span class="next"><i class="'+right_icon+'"></i></span>',
              speed: slide_speed,
              slidesToShow: slidesToShow,
              slidesToScroll: 1,
              responsive: [
                  {
                      breakpoint: 1201,
                      settings: {
                          arrows: false,
                      }
              }
            ]

          });

        }
        var $news_popup = $scope.find('.binduz-er-newsr-popup-video');
        $news_popup.magnificPopup({
          type: 'iframe'
          // other options
        });


        $('.binduz-er-newsr-popup-audio').magnificPopup({
          type:'inline',
          midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
        });

        var $topbar_headline = $scope.find('.binduz-er-top-news-2-slider');
        if($topbar_headline.length){

            var $slidersheadline = $topbar_headline.data('slide-controls');
            var autoplay            = Boolean($slidersheadline.autoplay);
            var autoplaySpeed       = parseInt( $slidersheadline.autoplaySpeed );
            var slide_speed         = parseInt($slidersheadline.slide_speed) ;
            var show_nav            = Boolean( $slidersheadline.show_nav );
            var slidesToShow        = parseInt($slidersheadline.slidesToShow);
            var slide_padding        = parseInt($slidersheadline.slide_padding);
            var right_icon          = $slidersheadline.right_icon;
            var left_icon           = $slidersheadline.left_icon; 

          $topbar_headline.slick({
                dots: false,
                infinite: true,
                autoplay: autoplay,
                autoplaySpeed: autoplaySpeed,
                arrows: show_nav,
                prevArrow: '<span class="prev"><i class="'+left_icon+'"></i></span>',
                nextArrow: '<span class="next"><i class="'+right_icon+'"></i></span>',
                speed: slide_speed,
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1201,
                        settings: {
                            arrows: false,
                        }
                }
              ]

            });

        } 
        
        var $social_news = $scope.find('.binduz-er-social-news-slide');
        if($social_news.length){

              var $slidersheadline    = $social_news.data('slide-controls');
              var autoplay            = Boolean($slidersheadline.autoplay);
              var autoplaySpeed       = parseInt( $slidersheadline.autoplaySpeed );
              var slide_speed         = parseInt($slidersheadline.slide_speed) ;
              var show_nav            = Boolean( $slidersheadline.show_nav );
              var slidesToShow        = parseInt($slidersheadline.slidesToShow);
              var slide_padding       = parseInt($slidersheadline.slide_padding);
              var right_icon          = $slidersheadline.right_icon;
              var left_icon           = $slidersheadline.left_icon; 
              
              $social_news.slick({
                dots: false,
                infinite: true,
                autoplay: autoplay,
                autoplaySpeed: autoplaySpeed,
                arrows: show_nav,
                prevArrow: '<span class="prev"><i class="'+left_icon+'"></i></span>',
                nextArrow: '<span class="next"><i class="'+right_icon+'"></i></span>',
                speed: slide_speed,
                slidesToShow: slidesToShow,
                slidesToScroll: 1,
                centerPadding:'20PX',
                responsive: [
                    {
                        breakpoint: 1201,
                        settings: {
                            arrows: false,
                        }
                },
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: false,
                            slidesToShow: 2,
                        }
                },
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            slidesToShow: 1,
                        }
                },
              ]

            });
        }
  
      
     
      

    }; 
   
    var Binduz_Er_Post_Image_Grid = function( $scope, $ ) {
      

     };


	// Make sure you run this code under Elementor.
	$( window ).on( 'elementor/frontend/init', function() {

	   	elementorFrontend.hooks.addAction( 'frontend/element_ready/element-ready-binduz-er-slider-post.default', Binduz_Er_Post_Slider );
	   	elementorFrontend.hooks.addAction( 'frontend/element_ready/binduz-image-post-grid-tab.default', Binduz_Er_Post_Image_Grid );
	
    } );

   
   // utility function  
   // get slider control default settings
   function er_slider_controls(controls=[]){
    var newObj = {

      er_slider_autoplay:true,
      er_slider_loop:false,
      er_slider_autoplay_hover_pause:false,
      er_slider_autoplay_timeout:5000,
      er_slider_dot_nav_show:false,
      er_slider_items:3,
      er_slider_items_mobile:1,
      er_slider_items_tablet:3,
      er_slider_padding:5,
      er_slider_nav_show:false,
      er_slider_smart_speed:250,

    };
  
    if ('er_slider_autoplay' in controls){
      if(controls.er_slider_autoplay == 'yes'){
        newObj.er_slider_autoplay = true;
      }else{
        newObj.er_slider_autoplay = false;
      }  
    }  
    
    if ('er_slider_loop' in controls){
      if(controls.er_slider_loop == 'yes'){
        newObj.er_slider_loop = true;
      }else{
        newObj.er_slider_loop = false;
      }  
    }

    if ('er_slider_dot_nav_show' in controls){
      if(controls.er_slider_dot_nav_show == 'yes'){
        newObj.er_slider_dot_nav_show = true;
      }else{
        newObj.er_slider_dot_nav_show = false;
      }  
    }
     if ('er_slider_nav_show' in controls){
      if(controls.er_slider_nav_show == 'yes'){
        newObj.er_slider_nav_show = true;
      }else{
        newObj.er_slider_nav_show = false;
      }  
    }

    if ('er_slider_autoplay_timeout' in controls){
       newObj.er_slider_autoplay_timeout = parseInt( controls.er_slider_autoplay_timeout );
    }

    if ('er_slider_items' in controls){
        newObj.er_slider_items = parseInt( controls.er_slider_items || 1 );
    }
    
    if ('slider_enable' in controls){
        newObj.slider_enable = Boolean( controls.slider_enable =='yes'?true:false);
    }

    if ('er_slider_items_mobile' in controls){
        newObj.er_slider_items_mobile = parseInt( controls.er_slider_items_mobile || 1 );
    }
    if ('er_slider_items_tablet' in controls){
        newObj.er_slider_items_tablet = parseInt( controls.er_slider_items_tablet || 1 );
    }
    
    if ('er_slider_padding' in controls){
        newObj.er_slider_padding = parseInt( controls.er_slider_padding || 0);
    } 
    
    if ('er_slider_smart_speed' in controls){
        newObj.er_slider_smart_speed =  controls.er_slider_smart_speed || 250;
    }
    return newObj; 
  }

  
} )( jQuery );


