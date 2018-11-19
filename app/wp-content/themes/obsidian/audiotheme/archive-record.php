<?php
/**
 * The template for displaying a record archives.
 *
 * @package Obsidian
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" <?php audiotheme_archive_class( array( 'content-area', 'archive-record' ) ); ?> role="main" itemprop="mainContentOfPage">

	<?php do_action( 'obsidian_main_top' ); ?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<?php the_audiotheme_archive_title( '<h1 class="page-title" itemprop="headline">', '</h1>' ); ?>
			<?php obsidian_post_type_navigation( 'audiotheme_record' ); ?>
		</header>

		<?php the_audiotheme_archive_description( '<div class="page-content" itemprop="text">', '</div>' ); ?>

		<div class="<?php obsidian_block_grid_classes(); ?>">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'audiotheme/record/content', 'archive' ); ?>

			<?php endwhile; ?>

		</div>

		<?php obsidian_content_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'audiotheme/record/content', 'none' ); ?>

	<?php endif; ?>

	<?php do_action( 'obsidian_main_bottom' ); ?>

</main>

<?php
get_footer();
