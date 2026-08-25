<?php
/**
 * Reusable property card.
 *
 * @package EstateinAssessment
 */

$post_id   = get_the_ID();
$visual    = estatein_property_meta( $post_id, 'visual', '1' );
$bedrooms  = estatein_property_meta( $post_id, 'bedrooms', '3' );
$bathrooms = estatein_property_meta( $post_id, 'bathrooms', '2' );
$type      = estatein_property_meta( $post_id, 'type', 'Residence' );
?>
<article <?php post_class( 'property-card card' ); ?>>
	<a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'View %s', 'estatein-assessment' ), get_the_title() ) ); ?>">
		<div class="property-visual property-visual--<?php echo esc_attr( in_array( $visual, array( '1', '2', '3' ), true ) ? $visual : '1' ); ?>" role="img" aria-label="<?php echo esc_attr( sprintf( __( 'Architectural view of %s', 'estatein-assessment' ), get_the_title() ) ); ?>"></div>
	</a>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="property-card__excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
	<div class="property-card__meta" aria-label="<?php esc_attr_e( 'Property summary', 'estatein-assessment' ); ?>">
		<span class="pill">⌂ <?php echo esc_html( $bedrooms ); ?> <?php esc_html_e( 'Bedroom', 'estatein-assessment' ); ?></span>
		<span class="pill">◫ <?php echo esc_html( $bathrooms ); ?> <?php esc_html_e( 'Bathroom', 'estatein-assessment' ); ?></span>
		<span class="pill">◇ <?php echo esc_html( $type ); ?></span>
	</div>
	<div class="property-card__footer">
		<div class="property-price">
			<span><?php esc_html_e( 'Price', 'estatein-assessment' ); ?></span>
			<strong><?php echo esc_html( estatein_property_price( $post_id ) ); ?></strong>
		</div>
		<a class="button button--primary" href="<?php the_permalink(); ?>"><?php esc_html_e( 'View Property Details', 'estatein-assessment' ); ?></a>
	</div>
</article>
