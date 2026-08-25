<?php
/**
 * Fallback index template.
 *
 * @package EstateinAssessment
 */

get_header();
?>
<main id="main-content" class="content-page">
	<div class="site-shell content-page__inner">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article <?php post_class( 'card card--pad' ); ?>>
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<article class="card card--pad"><h1><?php esc_html_e( 'Nothing found', 'estatein-assessment' ); ?></h1></article>
		<?php endif; ?>
	</div>
</main>
<?php get_footer();
