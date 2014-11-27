$(window).load(function() { 
	//Preloader 
	$('#status').delay(300).fadeOut(); 
	$('#preloader').delay(300).fadeOut('slow',function  () {
		$('.main').delay(550).css({'visibility':'visible'});
		$('body').delay(550).css({'overflow':'visible'});
		new WOW().init();
	});
	
})


jQuery(document).ready(function() {

		console.log($(".wow").attr('animation'));	
		$(".wow").delay(500).addClass($(this).attr('animation'));

	$(".page-hover").click(function(e) {

		pageActive=$(this).attr("activated");
		if (pageActive != "active" ) {
		$(".page-hover").attr('activated', 'inactive');
		$('.page-contenu').css('opacity', 0.01);
		$('.page-hover').css('background-color', 'invisible');
			$(this).css('background-color', 'black');
		pageId = get_page_id($(this).attr("data-id-page"))
		$(pageId).css({visibility: 'visible'});
		$(pageId).animate({opacity: 1}, 500);
		$(this).attr('activated', 'active');
	}else{
		$(this).attr('activated', 'inactive');
		$(this).css('background-color', 'invisible');
		pageId = get_page_id($(this).attr("data-id-page"))
		$(pageId).animate({opacity: 0.01}, 500);
		$(this).attr('activated', 'inactive');
	}


		

		
		

	});
	//----------------------Getion des pages Ajax
	$(".ajax").on('click',function(event) {
		$('#inscription').modal('toggle');
		$("body").css('overflow', 'hidden');

		var linkAjax = $(this).attr('href');
		var content_place = $(this).attr('data-target')+"-content";
			$.get(linkAjax, function(data) {

		$(content_place).append(data);
			
		});
		return false;
	});

	$('#inscription').on('hidden.bs.modal', function () {
		$("body").css('overflow', 'visible');
    
})
	

	
});

$(window).scroll(function() {
    if ($(".navbar").offset().top > 50) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
        $(".page-contenu").css('top', '51px');
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
        $(".page-contenu").css('top', '70px');
    }
});

// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});







function get_page_id (data_page_id) {
	return "#"+data_page_id;
}