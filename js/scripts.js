$(function(){
	$('a').smoothScroll({
		speed: 400,
		offset: 0
	});
	var height = $('.main').offset();
	console.log(height);
	$(window).scroll(function() {
	        if ($(this).scrollTop() >= height.top) {
	            $('.fixedNav ul').fadeIn();
	        }
	        else {
	            $('.fixedNav ul').hide();
	        }
	});
});