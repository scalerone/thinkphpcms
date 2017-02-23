;(function(){
	$('.sidebar-list>li>a').on('click',function(){
    $(this).next('.sub-menu').stop(true).slideToggle('slow');
    $(this).not(this).parents('li').find('.sub-menu').stop(true).slideToggle('slow');
});
})()