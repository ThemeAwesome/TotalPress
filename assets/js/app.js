/* @version 1.0.5 */
jQuery(document).foundation();

	// Add button class submit buttons in the theme
	jQuery('input[type="submit"]').addClass('button');

	// responsive embeds
	jQuery('iframe[src*="youtube.com"],iframe[src*="vimeo.com"],iframe[src*="dailymotion.com"],iframe[src*="videopress.com"]').wrap('<div class="responsive-embed widescreen" />');

	// Scroll to Top
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 200) {
			jQuery('.back-to-top').fadeIn(200);
		} else {
			jQuery('.back-to-top').fadeOut(200);
		}
	});
	
	// Animate scroll to top
	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0},500);
	});

	// Add clearfix class to gallery
	jQuery('.gallery').addClass('clearfix');

	// Adds screen reader span class to elements of menu-social-container
	jQuery('.menu-social-container a').each(function()
		{
	  	jQuery(this).wrapInner('<span class="screen-reader-text"></span>');
	});;