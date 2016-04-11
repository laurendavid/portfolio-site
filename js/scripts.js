$(function(){
	$('a').smoothScroll({
		speed: 300,
		offset: 0
	});
	var height = $('.main').offset();
	console.log(height);
	$(window).scroll(function() {
	        if ($(this).scrollTop() >= height.top) {
	        	console.log('hiiii')
	            $('.fixedNav').fadeIn(500);
	        }
	        else {
	            $('.fixedNav').fadeOut(500);
	        }
	});
});