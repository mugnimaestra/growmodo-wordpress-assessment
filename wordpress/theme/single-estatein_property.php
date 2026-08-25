<?php
/**
 * Single property template.
 *
 * @package EstateinAssessment
 */

get_header();

while ( have_posts() ) :
	the_post();
	$post_id   = get_the_ID();
	$visual    = estatein_property_meta( $post_id, 'visual', '1' );
	$location  = estatein_property_meta( $post_id, 'location', 'Malibu, California' );
	$bedrooms  = estatein_property_meta( $post_id, 'bedrooms', '4' );
	$bathrooms = estatein_property_meta( $post_id, 'bathrooms', '3' );
	$area      = estatein_property_meta( $post_id, 'area', '2,500 sq ft' );
	$amenities = preg_split( '/\r\n|\r|\n/', estatein_property_meta( $post_id, 'amenities', '' ) );

	$pricing_groups = array(
		array(
			'title' => __( 'Additional Fees', 'estatein-assessment' ),
			'items' => array(
				array( 'Property Transfer Tax', '$25,000', 'Based on the sale price and local regulations' ),
				array( 'Legal Fees', '$3,000', 'Approximate cost for legal services, including title transfer' ),
				array( 'Home Inspection', '$500', 'Recommended for due diligence' ),
				array( 'Property Insurance', '$1,200', 'Annual cost for comprehensive property insurance' ),
				array( 'Mortgage Fees', 'Varies', 'If applicable, consult with your lender for specific details' ),
			),
		),
		array(
			'title' => __( 'Monthly Costs', 'estatein-assessment' ),
			'items' => array(
				array( 'Property Taxes', '$1,250', 'Approximate monthly property tax based on the sale price and local rates' ),
				array( "Homeowners' Association Fee", '$300', 'Monthly fee for common area maintenance and security' ),
			),
		),
		array(
			'title' => __( 'Total Initial Costs', 'estatein-assessment' ),
			'items' => array(
				array( 'Listing Price', '$1,250,000', '' ),
				array( 'Additional Fees', '$29,700', 'Property transfer tax, legal fees, inspection, insurance' ),
				array( 'Down Payment', '$250,000', '20%' ),
				array( 'Mortgage Amount', '$1,000,000', 'If applicable' ),
			),
		),
		array(
			'title' => __( 'Monthly Expenses', 'estatein-assessment' ),
			'items' => array(
				array( 'Property Taxes', '$1,250', '' ),
				array( "Homeowners' Association Fee", '$300', '' ),
				array( 'Mortgage Payment', 'Varies based on terms and interest rate', 'If applicable' ),
				array( 'Property Insurance', '$100', 'Approximate monthly cost' ),
			),
		),
	);
	?>
	<main id="main-content">
		<section class="section property-overview-section">
			<div class="site-shell property-overview">
				<div class="property-title-row">
					<div>
						<h1><?php the_title(); ?></h1>
						<p class="property-location">⌖ <?php echo esc_html( $location ); ?></p>
					</div>
					<div class="property-title-price"><span><?php esc_html_e( 'Price', 'estatein-assessment' ); ?></span><strong><?php echo esc_html( estatein_property_price( $post_id ) ); ?></strong></div>
				</div>

				<div class="property-gallery card" aria-label="<?php esc_attr_e( 'Property gallery', 'estatein-assessment' ); ?>">
					<div class="property-gallery__thumbs" aria-hidden="true">
						<?php for ( $thumb = 0; $thumb < 9; $thumb++ ) : ?>
							<div class="property-visual property-visual--<?php echo esc_attr( (string) ( ( $thumb % 3 ) + 1 ) ); ?>"></div>
						<?php endfor; ?>
					</div>
					<div class="property-gallery__main">
						<div class="property-visual property-visual--<?php echo esc_attr( $visual ); ?>" role="img" aria-label="<?php echo esc_attr( get_the_title() ); ?>"></div>
						<div class="property-visual property-visual--2" role="img" aria-label="<?php esc_attr_e( 'Secondary architectural view', 'estatein-assessment' ); ?>"></div>
					</div>
					<div class="gallery-controls" aria-label="<?php esc_attr_e( 'Property gallery controls', 'estatein-assessment' ); ?>">
						<button type="button" aria-label="<?php esc_attr_e( 'Previous property image', 'estatein-assessment' ); ?>">←</button>
						<span aria-hidden="true"><i class="is-active"></i><i></i><i></i><i></i><i></i></span>
						<button type="button" aria-label="<?php esc_attr_e( 'Next property image', 'estatein-assessment' ); ?>">→</button>
					</div>
				</div>

				<div class="property-detail-grid">
					<article class="property-description card">
						<h2><?php esc_html_e( 'Description', 'estatein-assessment' ); ?></h2>
						<div><?php the_content(); ?></div>
						<div class="metrics" aria-label="<?php esc_attr_e( 'Property metrics', 'estatein-assessment' ); ?>">
							<div class="metric"><span><?php esc_html_e( 'Bedrooms', 'estatein-assessment' ); ?></span><strong><?php echo esc_html( str_pad( $bedrooms, 2, '0', STR_PAD_LEFT ) ); ?></strong></div>
							<div class="metric"><span><?php esc_html_e( 'Bathrooms', 'estatein-assessment' ); ?></span><strong><?php echo esc_html( str_pad( $bathrooms, 2, '0', STR_PAD_LEFT ) ); ?></strong></div>
							<div class="metric"><span><?php esc_html_e( 'Area', 'estatein-assessment' ); ?></span><strong><?php echo esc_html( $area ); ?></strong></div>
						</div>
					</article>
					<aside class="feature-panel card">
						<h2><?php esc_html_e( 'Key Features and Amenities', 'estatein-assessment' ); ?></h2>
						<ul class="feature-list">
							<?php foreach ( array_filter( $amenities ) as $amenity ) : ?><li><?php echo esc_html( $amenity ); ?></li><?php endforeach; ?>
						</ul>
					</aside>
				</div>
			</div>
		</section>

		<section class="section section--no-top property-inquiry-section">
			<div class="site-shell property-inquiry-layout">
				<div class="property-inquiry-copy">
					<h2><?php echo esc_html( sprintf( __( 'Inquire About %s', 'estatein-assessment' ), get_the_title() ) ); ?></h2>
					<p><?php esc_html_e( 'Interested in this property? Fill out the form below, and our real estate experts will get back to you with more details, including scheduling a viewing and answering any questions you may have.', 'estatein-assessment' ); ?></p>
				</div>
				<div id="contact-form" class="form-shell card property-inquiry-form">
					<?php if ( estatein_form_notice() ) : ?><p class="form-notice" role="status"><?php echo esc_html( estatein_form_notice() ); ?></p><?php endif; ?>
					<form class="form-grid" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
						<input type="hidden" name="action" value="estatein_inquiry"><input type="hidden" name="property_id" value="<?php echo esc_attr( $post_id ); ?>"><input type="hidden" name="property_name" value="<?php echo esc_attr( get_the_title() ); ?>">
						<?php wp_nonce_field( 'estatein_submit_inquiry', 'estatein_form_nonce' ); ?>
						<div class="field"><label for="property-first-name"><?php esc_html_e( 'First Name', 'estatein-assessment' ); ?></label><input id="property-first-name" name="first_name" autocomplete="given-name" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein-assessment' ); ?>" required></div>
						<div class="field"><label for="property-last-name"><?php esc_html_e( 'Last Name', 'estatein-assessment' ); ?></label><input id="property-last-name" name="last_name" autocomplete="family-name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein-assessment' ); ?>"></div>
						<div class="field"><label for="property-email"><?php esc_html_e( 'Email', 'estatein-assessment' ); ?></label><input id="property-email" name="email" type="email" autocomplete="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein-assessment' ); ?>" required></div>
						<div class="field"><label for="property-phone"><?php esc_html_e( 'Phone', 'estatein-assessment' ); ?></label><input id="property-phone" name="phone" autocomplete="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein-assessment' ); ?>"></div>
						<div class="field field--span-2"><label for="selected-property"><?php esc_html_e( 'Selected Property', 'estatein-assessment' ); ?></label><input id="selected-property" value="<?php echo esc_attr( get_the_title() . ', ' . $location ); ?>" disabled></div>
						<div class="field field--full"><label for="property-message"><?php esc_html_e( 'Message', 'estatein-assessment' ); ?></label><textarea id="property-message" name="message" placeholder="<?php esc_attr_e( 'Enter your Message here..', 'estatein-assessment' ); ?>"></textarea></div>
						<div class="form-actions"><p><?php esc_html_e( 'I agree with Terms of Use and Privacy Policy', 'estatein-assessment' ); ?></p><button class="button button--primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatein-assessment' ); ?></button></div>
					</form>
				</div>
			</div>
		</section>

		<section class="section section--no-top property-pricing-section">
			<div class="site-shell property-pricing">
				<div class="section-heading">
					<div class="section-heading__copy">
						<h2><?php esc_html_e( 'Comprehensive Pricing Details', 'estatein-assessment' ); ?></h2>
						<p><?php echo esc_html( sprintf( __( 'At Estatein, transparency is key. We want you to have a clear understanding of all costs associated with your property investment. Below, we break down the pricing for %s to help you make an informed decision.', 'estatein-assessment' ), get_the_title() ) ); ?></p>
					</div>
				</div>
				<div class="pricing-content">
					<div class="pricing-note card"><strong><?php esc_html_e( 'Note', 'estatein-assessment' ); ?></strong><span><?php esc_html_e( 'The figures provided above are estimates and may vary depending on the property, location, and individual circumstances.', 'estatein-assessment' ); ?></span></div>
					<div class="pricing-layout">
						<div class="listing-price"><span class="meta-label"><?php esc_html_e( 'Listing Price', 'estatein-assessment' ); ?></span><strong><?php echo esc_html( estatein_property_price( $post_id ) ); ?></strong></div>
						<div class="pricing-groups">
							<?php foreach ( $pricing_groups as $group ) : ?>
								<section class="pricing-group card">
									<div class="pricing-group__heading"><h3><?php echo esc_html( $group['title'] ); ?></h3><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'Learn More', 'estatein-assessment' ); ?></a></div>
									<div class="pricing-group__rows">
										<?php foreach ( $group['items'] as $item ) : ?>
											<div class="pricing-row"><strong><?php echo esc_html( $item[0] ); ?></strong><strong><?php echo esc_html( $item[1] ); ?></strong><?php if ( $item[2] ) : ?><p><?php echo esc_html( $item[2] ); ?></p><?php endif; ?></div>
										<?php endforeach; ?>
									</div>
								</section>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="faq" class="section section--no-top property-faq-section">
			<div class="site-shell">
				<div class="section-heading">
					<div class="section-heading__copy">
						<h2><?php esc_html_e( 'Frequently Asked Questions', 'estatein-assessment' ); ?></h2>
						<p><?php esc_html_e( "Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.", 'estatein-assessment' ); ?></p>
					</div>
					<a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'View All FAQ’s', 'estatein-assessment' ); ?></a>
				</div>
				<div class="grid grid--3">
					<article class="faq-card card"><h3><?php esc_html_e( 'How do I search for properties on Estatein?', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Learn how to use our user-friendly search tools to find properties that match your criteria.', 'estatein-assessment' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>#property-search"><?php esc_html_e( 'Read More', 'estatein-assessment' ); ?></a></article>
					<article class="faq-card card"><h3><?php esc_html_e( 'What documents do I need to sell my property through Estatein?', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Find out about the necessary documentation for listing your property with us.', 'estatein-assessment' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#selling"><?php esc_html_e( 'Read More', 'estatein-assessment' ); ?></a></article>
					<article class="faq-card card"><h3><?php esc_html_e( 'How can I contact an Estatein agent?', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Discover the different ways you can get in touch with our experienced agents.', 'estatein-assessment' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'Read More', 'estatein-assessment' ); ?></a></article>
				</div>
				<?php estatein_section_pager( '10', estatein_route_url( 'contact' ) . '#contact-form', __( 'View all frequently asked questions', 'estatein-assessment' ), __( 'View All FAQ’s', 'estatein-assessment' ) ); ?>
			</div>
		</section>
	</main>
	<?php
endwhile;
get_footer();
