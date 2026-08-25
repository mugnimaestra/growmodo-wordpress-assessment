<?php
/**
 * Property archive.
 *
 * @package EstateinAssessment
 */

get_header();

$search_value   = isset( $_GET['property_search'] ) ? sanitize_text_field( wp_unslash( $_GET['property_search'] ) ) : '';
$location_value = isset( $_GET['location'] ) ? sanitize_text_field( wp_unslash( $_GET['location'] ) ) : '';
$type_value     = isset( $_GET['property_type'] ) ? sanitize_text_field( wp_unslash( $_GET['property_type'] ) ) : '';
$price_value    = isset( $_GET['min_price'] ) ? sanitize_text_field( wp_unslash( $_GET['min_price'] ) ) : '';
$size_value     = isset( $_GET['property_size'] ) ? sanitize_text_field( wp_unslash( $_GET['property_size'] ) ) : '';
$year_value     = isset( $_GET['build_year'] ) ? sanitize_text_field( wp_unslash( $_GET['build_year'] ) ) : '';
?>
<main id="main-content">
	<section class="page-hero properties-hero">
		<div class="site-shell page-hero__copy">
			<h1><?php esc_html_e( 'Find Your Dream Property', 'estatein-assessment' ); ?></h1>
			<p><?php esc_html_e( 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life.', 'estatein-assessment' ); ?></p>
		</div>
	</section>

	<div id="property-search" class="site-shell property-search-wrap properties-search-wrap">
		<form class="property-search" method="get" action="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>" role="search">
			<div class="search-primary">
				<label class="screen-reader-text" for="property-search-input"><?php esc_html_e( 'Search properties', 'estatein-assessment' ); ?></label>
				<input id="property-search-input" type="search" name="property_search" value="<?php echo esc_attr( $search_value ); ?>" placeholder="<?php esc_attr_e( 'Search For A Property', 'estatein-assessment' ); ?>">
				<button class="button button--primary" type="submit"><?php esc_html_e( 'Find Property', 'estatein-assessment' ); ?></button>
			</div>
			<div class="search-filters">
				<label><span class="screen-reader-text"><?php esc_html_e( 'Location', 'estatein-assessment' ); ?></span><input name="location" value="<?php echo esc_attr( $location_value ); ?>" placeholder="<?php esc_attr_e( 'Location', 'estatein-assessment' ); ?>"></label>
				<label><span class="screen-reader-text"><?php esc_html_e( 'Property type', 'estatein-assessment' ); ?></span><select name="property_type"><option value=""><?php esc_html_e( 'Property Type', 'estatein-assessment' ); ?></option><?php foreach ( array( 'Villa', 'Apartment', 'Cottage' ) as $type ) : ?><option value="<?php echo esc_attr( $type ); ?>" <?php selected( $type_value, $type ); ?>><?php echo esc_html( $type ); ?></option><?php endforeach; ?></select></label>
				<label><span class="screen-reader-text"><?php esc_html_e( 'Minimum price', 'estatein-assessment' ); ?></span><select name="min_price"><option value=""><?php esc_html_e( 'Pricing Range', 'estatein-assessment' ); ?></option><option value="300000" <?php selected( $price_value, '300000' ); ?>>$300k+</option><option value="500000" <?php selected( $price_value, '500000' ); ?>>$500k+</option><option value="1000000" <?php selected( $price_value, '1000000' ); ?>>$1M+</option></select></label>
				<label><span class="screen-reader-text"><?php esc_html_e( 'Property size', 'estatein-assessment' ); ?></span><select name="property_size"><option value=""><?php esc_html_e( 'Property Size', 'estatein-assessment' ); ?></option><option value="1,650" <?php selected( $size_value, '1,650' ); ?>>1,650 sq ft</option><option value="1,900" <?php selected( $size_value, '1,900' ); ?>>1,900 sq ft</option><option value="2,500" <?php selected( $size_value, '2,500' ); ?>>2,500 sq ft</option></select></label>
				<label><span class="screen-reader-text"><?php esc_html_e( 'Build year', 'estatein-assessment' ); ?></span><input name="build_year" inputmode="numeric" pattern="[0-9]{4}" value="<?php echo esc_attr( $year_value ); ?>" placeholder="<?php esc_attr_e( 'Build Year', 'estatein-assessment' ); ?>"></label>
			</div>
		</form>
	</div>

	<section class="section properties-listing-section">
		<div class="site-shell properties-listing">
			<div class="results-summary section-heading">
				<div class="section-heading__copy"><h2><?php esc_html_e( 'Discover a World of Possibilities', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.', 'estatein-assessment' ); ?></p></div>
				<?php if ( $search_value || $location_value || $type_value || $price_value || $size_value || $year_value ) : ?><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>"><?php esc_html_e( 'Clear Filters', 'estatein-assessment' ); ?></a><?php endif; ?>
			</div>
			<?php if ( have_posts() ) : ?>
				<div class="property-grid">
					<?php while ( have_posts() ) : the_post(); get_template_part( 'template-parts/property', 'card' ); endwhile; ?>
				</div>
				<?php estatein_section_pager( '60', estatein_route_url( 'properties' ), __( 'View more properties', 'estatein-assessment' ), __( 'View More', 'estatein-assessment' ) ); ?>
			<?php else : ?>
				<div class="empty-state card"><h3><?php esc_html_e( 'No properties match these filters.', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Try a broader location, property type, or price range.', 'estatein-assessment' ); ?></p></div>
			<?php endif; ?>
		</div>
	</section>

	<section class="section section--no-top properties-lead-section">
		<div class="site-shell properties-lead">
			<div class="section-heading"><div class="section-heading__copy"><h2><?php esc_html_e( "Let's Make it Happen", 'estatein-assessment' ); ?></h2><p><?php esc_html_e( "Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match. Don't wait; let's embark on this exciting journey together.", 'estatein-assessment' ); ?></p></div></div>
			<div id="contact-form" class="form-shell card properties-lead-form">
				<?php if ( estatein_form_notice() ) : ?><p class="form-notice" role="status"><?php echo esc_html( estatein_form_notice() ); ?></p><?php endif; ?>
				<form class="form-grid" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
					<input type="hidden" name="action" value="estatein_inquiry">
					<?php wp_nonce_field( 'estatein_submit_inquiry', 'estatein_form_nonce' ); ?>
					<div class="field"><label for="properties-first-name"><?php esc_html_e( 'First Name', 'estatein-assessment' ); ?></label><input id="properties-first-name" name="first_name" autocomplete="given-name" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein-assessment' ); ?>" required></div>
					<div class="field"><label for="properties-last-name"><?php esc_html_e( 'Last Name', 'estatein-assessment' ); ?></label><input id="properties-last-name" name="last_name" autocomplete="family-name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein-assessment' ); ?>"></div>
					<div class="field"><label for="properties-email"><?php esc_html_e( 'Email', 'estatein-assessment' ); ?></label><input id="properties-email" type="email" name="email" autocomplete="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein-assessment' ); ?>" required></div>
					<div class="field"><label for="properties-phone"><?php esc_html_e( 'Phone', 'estatein-assessment' ); ?></label><input id="properties-phone" name="phone" autocomplete="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein-assessment' ); ?>"></div>
					<div class="field"><label for="properties-type"><?php esc_html_e( 'Preferred Property Type', 'estatein-assessment' ); ?></label><select id="properties-type" name="inquiry_type"><option><?php esc_html_e( 'Villa', 'estatein-assessment' ); ?></option><option><?php esc_html_e( 'Apartment', 'estatein-assessment' ); ?></option><option><?php esc_html_e( 'Cottage', 'estatein-assessment' ); ?></option></select></div>
					<div class="field"><label for="properties-location"><?php esc_html_e( 'Preferred Location', 'estatein-assessment' ); ?></label><input id="properties-location" name="source" placeholder="<?php esc_attr_e( 'Enter Location', 'estatein-assessment' ); ?>"></div>
					<div class="field field--full"><label for="properties-message"><?php esc_html_e( 'Message', 'estatein-assessment' ); ?></label><textarea id="properties-message" name="message" placeholder="<?php esc_attr_e( 'Enter your Message here..', 'estatein-assessment' ); ?>"></textarea></div>
					<div class="form-actions"><p><?php esc_html_e( 'By submitting, you agree that Estatein may contact you about this inquiry.', 'estatein-assessment' ); ?></p><button class="button button--primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatein-assessment' ); ?></button></div>
				</form>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
