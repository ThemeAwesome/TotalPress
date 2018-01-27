<?php /* @version 1.0.14 */
if ( ! defined('ABSPATH')) exit; ?>
<section class="no-results not-found">
	<?php do_action('totalpress_before_post'); ?>
	<header class="page-header">
		<h1 class="page-title"><?php printf(esc_attr('Nothing found for: %s','totalpress'),'<span>'.get_search_query().'</span>'); ?></h1>
	</header><!-- .page-header -->
	<div class="page-content" itemprop="text">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<p><?php printf( esc_attr('Ready to publish your first post? <a href="%1$s">Get started here</a>.','totalpress'), esc_url( admin_url('post-new.php'))); ?></p>
		<?php elseif ( is_search() ) : ?>
			<p><?php echo apply_filters('totalpress_content_none_text', esc_attr('Try doing another search, making sure any spelling, cApitALiZaTiOn, and punctuation are correct.','totalpress')); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p><?php echo apply_filters('totalpress_content_none_sorry_text', esc_attr('Sorry, we can&rsquo;t find what you&rsquo;re looking for. Maybe trying another search will help.','totalpress')); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div><!-- .page-content -->
	<?php do_action( 'totalpress_after_post'); ?>
</section><!-- .no-results -->