$(document).ready(function() {
	
	var contentArea = $('.content').offset();
	$(document).scrollTop(contentArea.top - 100);
	
	
	$(document).scroll(function() {
		var viewHeight = $(window).innerHeight(); 
		var scroll = $(document).scrollTop();
		var documentSize = $(document.body).outerHeight();
		
		console.debug('document: ' + documentSize + "\n view: " + viewHeight + "\n scroll: " + scroll);
		
		if(scroll + viewHeight >= documentSize) {
	//		$(document).scrollTop(1);
		}
		
		if(scroll <= 0) {
	//		$(document).scrollTop(documentSize -1 );
		}
	});
	
	
});