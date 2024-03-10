<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Poseidon
 */

get_header();

// Get Theme Options from Database.
$theme_options = poseidon_theme_options();

// Retrieve related page by category slug
$category = get_category( get_query_var( 'cat' ) );
$page = get_page_by_path( $category->slug );

// in case there is a content page for the current category render it in the top area
if ( $page && $page->post_status == 'publish') : ?>

	<section id="primary" class="fullwidth-content-area content-area">
		
		<header class="page-header">

			<?php echo '<h1>' . apply_filters('the_title', $page->post_title) . '</h1>'; ?>
			<?php echo apply_filters('the_content', $page->post_content); ?>

		</header><!-- .page-header -->

		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php the_archive_title( '<h2 class="archive-title">', '</h2>' ); ?>
				
				<?php
				if ( have_posts() ) : ?>

					<div id="post-wrapper" class="post-wrapper clearfix">

						<?php while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', esc_attr( $theme_options['post_content'] ) );

						endwhile; ?>

					</div>

					<?php poseidon_pagination();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; ?>
			</main><!-- #main -->
		</section><!-- #primary -->
		<?php get_sidebar(); ?>
	
	</section><!-- #primary -->

<?php else : ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">

				<?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
				<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>

			</header><!-- .page-header -->

			<div id="post-wrapper" class="post-wrapper clearfix">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', esc_attr( $theme_options['post_content'] ) );

				endwhile; ?>

			</div>

			<?php poseidon_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
