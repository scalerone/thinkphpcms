//banner
;$(document).ready(function(){
	$('.flexslider').flexslider({
		directionNav: true,
		pauseOnAction: false
	});
	//user-box show
	$('#user-dowm').click(function(){
		$('header .user>.user-box').slideToggle('fast');
	});
});