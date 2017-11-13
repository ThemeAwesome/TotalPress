<?php /* @version 1.0.1 */
if ( ! defined('ABSPATH')) exit; ?>
<?php do_action('totalpress_before_page'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php totalpress_article_schema('CreativeWork'); ?>>
	<div class="inside-article">
		<?php do_action('totalpress_before_template_titles'); ?>
		<header class="entry-header">	
			<?php if (get_post_meta($post->ID,'page_options_hide_title',true)) {
		   		the_title('<h1 class="entry-title hide" itemprop="headline">','</h1>');
			  } else {
		   		the_title('<h1 class="entry-title" itemprop="headline">','</h1>');
			  } ?>
		</header><!-- .entry-header -->
		<?php do_action('totalpress_after_template_titles'); ?>
		<div class="post-image"><?php the_post_thumbnail('full',array('itemprop' => 'image')); ?></div><!-- .post-image -->
		<div class="entry-content" itemprop="text">
			<?php the_content(); wp_link_pages( array(
				'before' => '<div class="page-links">' . __('Pages:','totalpress'),'after' => '</div>',)); ?>
		</div><!-- .entry-content -->
		<?php do_action('totalpress_after_template_post'); ?>
		<?php totalpress_entry_page_footer(); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
<?php do_action('totalpress_after_page'); ?>