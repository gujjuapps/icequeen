$(document).ready(function(){
    $(".promo").click(function(){
        $(".promo-control").toggle();
    });
});

/* jQuery('#home_banner').owlCarousel({
	  items:1,
	  loop:true,
	  margin:0,
	  nav:true,
	  dots:true,
	  autoplay:true,
	  smartSpeed:2500,
	  autoplayTimeout:3000,
	  navText:['<span class="left-main banner_arrow"><span class="bannerarrow_left"></span></span></span>', '<span class="right-main banner_arrow"><span class="bannerarrow_right"></span></span>'],
	  onInitialize: function(e) { $("#home_banner .item").length <= 1 && (this.settings.loop = !1) },
	  responsive:{
	   0:{
		items:1
	   },
	   600:{
		items:1
	   },
	   1000:{
		items:1
	   }
	  }
});
 $("#testimoal-slider").owlCarousel({
      items:3,
	  loop:true,
	  margin:30,
	  nav:true,
	  dots:true,
	  autoplay:true,
	  smartSpeed:2500,
	  autoplayTimeout:3000,
	  responsive:{
	   0:{
		items:1
	   },
	   600:{
		items:2
	   },
	   1000:{
		items:3
	   }
	  }	  
});
*/
jQuery(document).ready(function(){
    $(".head-search").click(function(){
			$(".search-main").toggle();
		});
	});

	$(document).on('click', function(e) { 
	if ($(e.target).closest('.search-main').length ) 
		{ 
			$("navbar-toggle").click(".search-main").css("display", "none");
		}
	else if ( ! $(e.target).closest('.head-search').length ) 
		{ 
			$('.search-main').hide(); 
		} 
	else
		{ 
			return ; 
		} 
});
		
$(document).ready(function(){
	
    $(".wel-sec").niceScroll();
    $(".happywork_cont").niceScroll();
	
        $(".search_box_main .btn-search").click(function() {
            $(".search_box input[type='search']").focus();
        });
    
	$(".sticky_button").click(function() {
            $(".sticky_box_main").fadeIn(700);
                    $("body").addClass("stickypop");
        });
            $(".form_close").click(function() {
            $(".sticky_box_main").fadeOut(700);
                    $("body").removeClass("stickypop");
        });
	jQuery(window).bind('resize load', function() {
		if (jQuery(this).width() < 767) {
			jQuery('.service-detail-main .collapse').removeClass('in');
			jQuery('.service-detail-main .collapse').addClass('out');
		} else {
			jQuery('.service-detail-main .collapse').removeClass('out');
			jQuery('.service-detail-main .collapse').addClass('in');
		}
	});
	
	
	if ($(window).width() >= 1025) {
		 $(window).scroll(function() {
			if ($(this).scrollTop() > 1){  
				$('.menu-main').addClass("sticky");
			  }
			  else{
				$('.menu-main').removeClass("sticky");
			  }
	   	});
	  }
	 else {
		$('.menu-main').removeClass("sticky");
	 }
	 
	  
	 // ---back top js----- //

    	jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() != 0) {
				jQuery('#toTop').fadeIn();
			} else {
				jQuery('#toTop').fadeOut();
			}
		}); 
    jQuery('#toTop').click(function(){
        jQuery("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
	// ---End back top js----- //
	
		
	(function(){

		  var parallax = document.querySelectorAll(".parallax"),
			  speed = 0.91;
		
		  window.onscroll = function(){
			[].slice.call(parallax).forEach(function(el,i){
		
			  var windowYOffset = window.pageYOffset,
				  elBackgrounPos = "center " + (windowYOffset * speed) + "px";
			  
			  el.style.backgroundPosition = elBackgrounPos;
		
			});
		  };
		  
		  
			  
		})();
		
	jQuery(".welcome_content").mCustomScrollbar({
		mouseWheel:false
	});	
        
		
});
$(document).ready(function(){
    $(".news_page .blog_listing span").click(function()
     {
        $(this).parent(".blog_listing").children("ul").slideToggle();
        $(this).parent(".blog_listing").toggleClass("in");
    });
    $(".news_page .blog_listing.tags span").click(function()
    {
        $(this).parent(".blog_listing").children(".tags-box").slideToggle();
    });
});
// Gallery Overlay
$('ul.galleryImg li a').append('<div></div>');

// Image Lightbox
$("a[rel^='prettyPhoto']").prettyPhoto({overlay_gallery: true});


jQuery(window).bind('resize load', function () {
    jQuery('.inner_page_container_main').addClass('container_main'); var get_header = $("header").height();
    var get_footer = $("footer").height();
    //var get_inner_banner = $(".innerbanner_section").height();
    var get_window = $(window).height(); 
    var get_height = get_window - get_header - get_footer - 75;
    $(".container_main").css("min-height", get_height + 'px');
});
