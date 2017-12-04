$(window).load(function(){
	$('#loading').fadeOut(300);
	new WOW().init();
});

$(function(){
"use strict";	
	//#pagetop
	$('#pagetop').click(function(){
    	$("html,body").animate({scrollTop: 0}, 500, 'swing');
    		return false;
  		});
  		var pagetop = $('#pagetop');
		$(window).scroll(function () {
			
			var dHeight = $(document).height();
			var sDistance = $(window).height() + $(window).scrollTop();
			var fHeight = $('#footer').height();
			
			if ($(this).scrollTop() > 200 && dHeight - sDistance  >= fHeight) {
				
				pagetop.fadeIn("slow");
				pagetop.removeClass('ab');
				
			} else if($(this).scrollTop() > 200 && dHeight - sDistance  <= fHeight) {
				
				pagetop.addClass('ab');
				
			} else {
				
				pagetop.removeClass('ab');
				pagetop.fadeOut("slow");
				
			}
	});
	
	
	WebFont.load({
    custom: {
        families: ['heisei-mincho-std'],
        urls: ['/PSC/htdocs/assets/bootstrap/css/psc.css']
    },
    active: function() {
	
	//$('#loading').fadeOut(300);
//	new WOW().init();
	
	setTimeout(function(){
       	$("html.wf-active #services .box .box-body li a").matchHeight();
		$(".sub #related-links li .info").matchHeight();
    },1000);
    }
});
	
});