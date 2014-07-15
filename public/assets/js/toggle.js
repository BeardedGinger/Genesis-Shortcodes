jQuery(document).ready( function($) {

	$(".gb-toggle").find(".gb-toggle-trigger").click( function() {

		if( $(this).hasClass("active") ) {
			$(this).removeClass("active");
		} else {
			$(this).addClass("active");
		}

		$(this).parent(".gb-toggle").children(".gb-toggle-content").slideToggle();

	});
});