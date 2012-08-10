function initFeaturedSlideShow() {
	if( $('#featuredWrapper').length === 0)
		return;
	
	$('#featuredWrapper > .slides').serialScroll();
}
	
$(document).ready(function() {
		
	initFeaturedSlideShow();
	
});





