<?php /* @version 1.0.1 */
if ( ! defined('ABSPATH')) exit; ?>
<?php do_action('totalpress_before_post'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php totalpress_article_schema('CreativeWork'); ?>>
	<div class="inside-article">

		<?php do_action('totalpress_before_entry_header'); ?>

		<div class="post-image"><?php the_post_thumbnail('full',array('itemprop' => 'image')); ?></div><!-- .post-image -->

		<header class="entry-header">
			<?php if (get_post_meta($post->ID,'page_options_hide_title',true)) {
		   		the_title('<h1 class="entry-title hide" itemprop="headline">','</h1>');
			  } else {
		   		the_title('<h1 class="entry-title" itemprop="headline">','</h1>');
			  } ?>
			<?php totalpress_posted_on(); ?>
		</header><!-- .entry-header -->

		<?php do_action('totalpress_after_entry_header'); ?>

		<div class="entry-content" itemprop="text">
			<?php the_content(); ?>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . __('Pages:','totalpress'),
				'after'  => '</div>',
			) ); ?>
		</div><!-- .entry-content -->


		<?php totalpress_entry_footer(); ?>
		<?php do_action('totalpress_post_navigation'); ?>
		<?php do_action( 'totalpress_after_entry_content' ); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
<?php do_action('totalpress_after_post'); ?>
<?php do_action('totalpress_display_author'); ?>