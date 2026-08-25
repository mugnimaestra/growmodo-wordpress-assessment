<?php
/**
 * Default page template.
 *
 * @package EstateinAssessment
 */

get_header();
?>
<main id="main-content" class="content-page">
	<div class="site-shell content-page__inner">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<p class="eyebrow"><?php esc_html_e( 'Estatein', 'estatein-assessment' ); ?></p>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php get_footer();
