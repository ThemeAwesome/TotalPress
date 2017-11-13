<?php /* @version 1.0.1 */
if ( ! defined('ABSPATH')) exit; ?>
<?php do_action('totalpress_before_post'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php totalpress_article_schema('CreativeWork'); ?>>
	<div class="inside-article">
		<?php do_action('totalpress_before_entry_header'); ?>
		<header class="entry-header">
			<?php do_action( 'totalpress_before_entry_title'); ?>
			<?php the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php totalpress_posted_on(); ?>
			<?php do_action( 'totalpress_after_entry_title'); ?>
		</header><!-- .entry-header -->
		<?php do_action('totalpress_after_entry_header'); ?>
		<div class="post-image"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php the_post_thumbnail('full',array('itemprop' => 'image')); ?></a></div><!-- .post-image -->
		<?php if ( get_theme_mod('show_excerpt') == 'excerpt') : ?>
		<div class="entry-summary" itemprop="text">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content" itemprop="text">
			<?php the_content(); ?>
			<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__('Pages:','totalpress'),
			'after'  => '</div>',
			)); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>
		<?php totalpress_entry_footer(); ?>
		<?php do_action( 'totalpress_after_entry_content' ); ?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
<?php do_action('totalpress_after_post'); ?>