'use strict';
var $ = jQuery,
		isTouchDevice = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/);

$(window).load(function() {
 
  fullWidthBox();
  menu();
  //footerStructure();
  tabs();
  //accordions();
  headerCustomizer();
  //modernGallery();
  animations();
  //formStylization();
  //addReview();
  
  //videoBg();
  //loginRegister();
  //loadingButton();
  //productLimited();
  //wordRotate();
  
  
});

//Calculating The Browser Scrollbar Width
var parent, child, scrollWidth, bodyWidth;

if (scrollWidth === undefined) {
  parent      = $('<div style="width: 50px; height: 50px; overflow: auto"><div/></div>').appendTo('body');
  child       = parent.children();
  scrollWidth = child.innerWidth() - child.height(99).innerWidth();
  parent.remove();
}


//Full Width Box
function fullWidthBox() {
  if ($('.full-width-box.auto-width').length) {
		var windowWidth    = $('body').outerWidth(),
				containerWidth = $('.header .container').width();
			
		$('.full-width-box.auto-width').each(function() {
			$(this)
				.css({
					left  : ( containerWidth - windowWidth) / 2,
					width : windowWidth
				})
				.addClass('loaded');
		});
  }
}

//Animations
function animations() {}

//Header Fixed
function headerCustomizer() {}

//Header Menu
function menu() {
  var body    = $('body'),
			primary = '.primary';
  $(primary).find('.parent > a .open-sub, .megamenu .title .open-sub').remove();
  
  //if ((body.width() + scrollWidth) < 992 || $('.header').hasClass('minimized-menu')){
  if ($(window).width() < 992 || $('.header').hasClass('minimized-menu')){
		$(primary).find('.parent > a, .megamenu .title').append('<span class="open-sub"><span></span><span></span></span>');
  }else{
		$(primary).find('ul').removeAttr('style').find('li').removeClass('active');
  }
  $(primary).find('.open-sub').click(function(e){
		e.preventDefault();
		
		var item = $(this).closest('li, .box');
		
		if ($(item).hasClass('active')) {
			$(item).children().last().slideUp(600);
			$(item).removeClass('active');
		} else {
			var li = $(this).closest('li, .box').parent('ul, .sub-list').children('li, .box');
			
			if ($(li).is('.active')) {
				$(li).removeClass('active').children('ul').slideUp(600);
			}
			
			$(item).children().last().slideDown(600);
			$(item).addClass('active');
			
			if (body.width() + scrollWidth > 991) {
				var maxHeight = body.height() - ($(primary).find('.navbar-nav')).offset().top - 20;
				
				$(primary).find('.navbar-nav').css({
					maxHeight : maxHeight,
					overflow  : 'auto'
				});
			}
		}
  });

  $(primary).find('.parent > a').click(function(e){
		if (((body.width() + scrollWidth) > 991) &&  (isTouchDevice)) {
			var $this = $(this);
			
			if ($this.parent().hasClass('open')) {
				$this.parent().removeClass('open')
			} else {
				e.preventDefault();
				
				$this.parent().addClass('open')
			}
		}
  });
  
  $(".primary").click(function () {
   
});

$(window).on('click touchend',function (e) {
	if (!$(e.target).hasClass("btn-navbar") && !$(e.target).hasClass("text") && !$(e.target).hasClass("icon-bar") 
        && $(e.target).parents(".navbar-collapse").length === 0) 
    
	{
        $(".navbar-collapse").removeClass('in');
		$(".navbar-collapse").attr('aria-expanded','false');
		
    }
});
  
  /* Top Menu */
  var topMenu = $('.top-navbar').find('.collapse');

  if ((body.width() + scrollWidth) < 992)
		topMenu.css('width', body.find('#top-box .container').width());
	else
		topMenu.css('width', 'auto');
}

//Tabs
function tabs() {
  var tab = jQuery('.nav-tabs');
  
  tab.find('a').click(function (e) {
		e.preventDefault();
		
		$(this).tab('show');
  });

  if (($('body').width() + scrollWidth) < 768 && (!tab.hasClass('no-responsive'))) {
    tab.each(function(){
			var $this = $(this);
			
			if (!$this.next('.tab-content').hasClass('hidden') && !$this.find('li').hasClass('dropdown')) {
				$this.addClass('accordion-tab');
		
				$this.find('a').each(function(){
					var $this = $(this),
						id = $this.attr('href');
					
					$this.prepend('<span class="open-sub"></span>');
					
					$this.closest('.nav-tabs').next('.tab-content').find(id)
					.appendTo($this.closest('li'));
				});
				
				$this.next('.tab-content').addClass('hidden');
			}
    });
	
		$('.accordion-tab > li.active .tab-pane').slideDown();
  } else {
		tab.find('.tab-pane').removeAttr('style', 'display');
		
		tab.each(function(){
			var $this = $(this);
				
			if ($this.next('.tab-content').hasClass('hidden')) {
				$this.removeClass('accordion-tab');
				
				$this.find('a').each(function(){
					var $this = $(this),
							id = $this.attr('href');
					
					$($this.closest('li').find('.tab-pane')).appendTo($this.closest('.nav-tabs').next('.tab-content'));
				});
				
				$this.next('.tab-content').removeClass('hidden');
			}
    });
  }
  
  $('.accordion-tab > li > a').on('shown.bs.tab', function (e) {
		if (($('body').width() + scrollWidth) < 768) {	  
			var $this = $(this),
					tab = $this.closest('li');
			
			e.preventDefault();
			
			$this
				.closest('.accordion-tab')
				.find('.tab-pane').not(tab.find('.tab-pane'))
				.removeClass('active')
				.slideUp();
				
			tab.find('.tab-pane')
				.addClass('active')
				.slideDown();
	
			$('html, body').on("scroll mousedown DOMMouseScroll mousewheel keyup", function(){
				$('html, body').stop();
			});
			
			setTimeout(function(){ 
				$('html, body').animate({
					scrollTop: $this.offset().top
				}, 800);
			}, 500 );
		}
  });
}


//Modal Window
function centerModal() {
  $(this).css('display', 'block');
  
  var dialog = $(this).find('.modal-dialog'),
	    offset = ($(window).height() - dialog.height()) / 2;
	  
  if (offset < 10)
		offset = 10;
	
  dialog.css('margin-top', offset);
}


//One Page End
$(document).ready(function(){
  
  //Replace img > IE8
  if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
		var ieversion = new Number(RegExp.$1);
		
		if (ieversion < 9) {
			$('img[src*="svg"]').attr('src', function() {
				return $(this).attr('src').replace('.svg', '.png');
			});
		}
  }
  
  //IE 
  if (/MSIE (\d+\.\d+);/.test(navigator.userAgent))
		$('html').addClass('ie');

  //Touch device
  if( isTouchDevice ) {
		$('body').addClass('touch-device');
  }
  //Bootstrap Elements
	
	//Charts
	if ($('.chart').length && typeof chart == 'function') chart();
	if (typeof graph == 'function') graph();
	
	//Zoom
	if ($('.general-img').length && typeof zoom == 'function') zoom();
	
	//Blur
	if ($('.full-width-box .fwb-blur').length && typeof blur == 'function') blur();
	if ($('.blur-page').length && typeof blurPage == 'function') blurPage();
	
	//One Page
	if (typeof scrollMenu == 'function') scrollMenu();
	
	
	
	
  
  
  //Menu > Sidebar
  $('.menu .parent:not(".active") a').next('.sub').css('display', 'none');
  $('.menu .parent a .open-sub').click(function(e){
		e.preventDefault();
	
    if ($(this).closest('.parent').hasClass('active')) {
      $(this).parent().next('.sub').slideUp(600);
      $(this).closest('.parent').removeClass('active');
    } else {
      $(this).parent().next('.sub').slideDown(600);
      $(this).closest('.parent').addClass('active');
    }
  });
  
  
  //Retina
  if('devicePixelRatio' in window && window.devicePixelRatio >= 2) {
    var imgToReplace = $('img.replace-2x').get();
  
    for (var i=0,l=imgToReplace.length; i<l; i++) {
      var src = imgToReplace[i].src;
			src = src.replace(/\.(png|jpg|gif)+$/i, '@2x.$1');
			imgToReplace[i].src = src;
			
			$(imgToReplace[i]).load(function(){
				$(this).addClass('loaded');
			});
    };
  }
});

//Window Resize
(function(){
  var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
  })();
  
  function resizeFunctions(){
		//Functions
		fullWidthBox();
		menu();
		//footerStructure();
		tabs();
		//modernGallery();
		animations();
		
		//loginRegister();
	}

	if(isTouchDevice) {
		$(window).bind('orientationchange', function(){
			delay(function(){
				resizeFunctions();
			}, 200);
		});
  } else {
		$(window).on('resize', function(){
			delay(function(){
				resizeFunctions();
			}, 500);
		});
  }
}());