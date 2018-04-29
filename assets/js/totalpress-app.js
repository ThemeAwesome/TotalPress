/* @version 1.0.23 */
jQuery(document).foundation();
	jQuery('input[type="submit"]').addClass('button');
	jQuery('iframe[src*="youtube.com"],iframe[src*="vimeo.com"],iframe[src*="dailymotion.com"],iframe[src*="videopress.com"]').wrap('<div class="responsive-embed widescreen" />');
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 200) {
			jQuery('.back-to-top').fadeIn(200);
		} else {
			jQuery('.back-to-top').fadeOut(200);
		}
	});
	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0},500);
	});
	jQuery('.gallery').addClass('clearfix');
	jQuery('.menu-social-container a').each(function()
		{
	  	jQuery(this).wrapInner('<span class="screen-reader-text"></span>');
	});;