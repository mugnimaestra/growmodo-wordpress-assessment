<?php
/**
 * Home page template.
 *
 * @package EstateinAssessment
 */

get_header();
?>
<main id="main-content">
	<section class="home-hero" aria-labelledby="home-hero-title">
		<div class="home-hero__content">
			<div class="home-hero__content-inner">
				<h1 id="home-hero-title"><?php esc_html_e( 'Discover Your Dream Property with Estatein', 'estatein-assessment' ); ?></h1>
				<p><?php esc_html_e( 'Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.', 'estatein-assessment' ); ?></p>
				<div class="hero-actions">
					<a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'about' ) ); ?>" aria-label="<?php esc_attr_e( 'Learn more about Estatein', 'estatein-assessment' ); ?>"><?php esc_html_e( 'Learn More', 'estatein-assessment' ); ?><span class="screen-reader-text"> <?php esc_html_e( 'about Estatein', 'estatein-assessment' ); ?></span></a>
					<a class="button button--primary" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>"><?php esc_html_e( 'Browse Properties', 'estatein-assessment' ); ?></a>
				</div>
				<div class="stats-row" aria-label="<?php esc_attr_e( 'Estatein statistics', 'estatein-assessment' ); ?>">
					<div class="stat-card"><strong>200+</strong><span><?php esc_html_e( 'Happy Customers', 'estatein-assessment' ); ?></span></div>
					<div class="stat-card"><strong>10k+</strong><span><?php esc_html_e( 'Properties For Clients', 'estatein-assessment' ); ?></span></div>
					<div class="stat-card"><strong>16+</strong><span><?php esc_html_e( 'Years of Experience', 'estatein-assessment' ); ?></span></div>
				</div>
			</div>
		</div>
		<div class="home-hero__visual" aria-label="<?php esc_attr_e( 'Modern architectural property illustration', 'estatein-assessment' ); ?>" role="img">
			<div class="hero-badge" aria-hidden="true">↗</div>
		</div>
	</section>

	<section class="quick-links" aria-label="<?php esc_attr_e( 'Estatein services', 'estatein-assessment' ); ?>">
		<a class="quick-link" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">⌂</span><span><?php esc_html_e( 'Find Your Dream Home', 'estatein-assessment' ); ?></span></a>
		<a class="quick-link" href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#selling"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">◇</span><span><?php esc_html_e( 'Unlock Property Value', 'estatein-assessment' ); ?></span></a>
		<a class="quick-link" href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#management"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">▣</span><span><?php esc_html_e( 'Effortless Property Management', 'estatein-assessment' ); ?></span></a>
		<a class="quick-link" href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#investment"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">⌁</span><span><?php esc_html_e( 'Smart Investments, Informed Decisions', 'estatein-assessment' ); ?></span></a>
	</section>

	<section id="featured-properties" class="section">
		<div class="site-shell">
			<div class="section-heading">
				<div class="section-heading__copy">
					<h2><?php esc_html_e( 'Featured Properties', 'estatein-assessment' ); ?></h2>
					<p><?php esc_html_e( 'Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.', 'estatein-assessment' ); ?></p>
				</div>
				<a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>"><?php esc_html_e( 'View All Properties', 'estatein-assessment' ); ?></a>
			</div>
			<div class="property-grid">
				<?php
				$featured = new WP_Query(
					array(
						'post_type'      => 'estatein_property',
						'post_status'    => 'publish',
						'posts_per_page' => 3,
						'orderby'        => 'ID',
						'order'          => 'ASC',
					)
				);
				if ( $featured->have_posts() ) :
					while ( $featured->have_posts() ) :
						$featured->the_post();
						get_template_part( 'template-parts/property', 'card' );
					endwhile;
				else :
					?>
					<div class="empty-state card card--pad"><p><?php esc_html_e( 'Property content will appear here after the theme demo content is created.', 'estatein-assessment' ); ?></p></div>
					<?php
				endif;
				wp_reset_postdata();
				?>
			</div>
			<?php estatein_section_pager( '60', estatein_route_url( 'properties' ), __( 'View all properties', 'estatein-assessment' ), __( 'View All Properties', 'estatein-assessment' ) ); ?>
		</div>
	</section>

	<section id="testimonials" class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading">
				<div class="section-heading__copy">
					<h2><?php esc_html_e( 'What Our Clients Say', 'estatein-assessment' ); ?></h2>
					<p><?php esc_html_e( 'Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.', 'estatein-assessment' ); ?></p>
				</div>
				<a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'about' ) ); ?>#clients"><?php esc_html_e( 'View All Testimonials', 'estatein-assessment' ); ?></a>
			</div>
			<div class="grid grid--3">
				<?php
				$testimonials = array(
					array( 'title' => 'Exceptional Service!', 'copy' => 'The team listened carefully, explained every step, and made finding our home feel much simpler than we expected.', 'name' => 'Wade Warren', 'place' => 'USA, California' ),
					array( 'title' => 'Trusted Advisors', 'copy' => 'Estatein guided us through the entire buying process with practical advice and consistent follow-through.', 'name' => 'John Mans', 'place' => 'USA, Nevada' ),
					array( 'title' => 'Efficient and Reliable', 'copy' => 'We always knew what came next. Communication was clear and the team kept the transaction moving without unnecessary stress.', 'name' => 'Sarah D.', 'place' => 'USA, New York' ),
				);
				foreach ( $testimonials as $testimonial ) :
					?>
					<article class="testimonial-card card">
						<div class="rating" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'estatein-assessment' ); ?>">★★★★★</div>
						<h3><?php echo esc_html( $testimonial['title'] ); ?></h3>
						<blockquote><p>“<?php echo esc_html( $testimonial['copy'] ); ?>”</p></blockquote>
						<div class="person"><span class="avatar" aria-hidden="true"></span><div><strong><?php echo esc_html( $testimonial['name'] ); ?></strong><span><?php echo esc_html( $testimonial['place'] ); ?></span></div></div>
					</article>
					<?php
				endforeach;
				?>
			</div>
			<?php estatein_section_pager( '10', estatein_route_url( 'about' ) . '#clients', __( 'View all testimonials', 'estatein-assessment' ), __( 'View All Testimonials', 'estatein-assessment' ) ); ?>
		</div>
	</section>

	<section id="faq" class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading">
				<div class="section-heading__copy">
					<h2><?php esc_html_e( 'Frequently Asked Questions', 'estatein-assessment' ); ?></h2>
					<p><?php esc_html_e( "Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.", 'estatein-assessment' ); ?></p>
				</div>
				<a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'View All FAQ’s', 'estatein-assessment' ); ?></a>
			</div>
			<div class="grid grid--3">
				<article class="faq-card card"><h3><?php esc_html_e( 'How do I search for properties on Estatein?', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Learn how to use our user-friendly search tools to find properties that match your criteria.', 'estatein-assessment' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>#property-search" aria-label="<?php esc_attr_e( 'Read more about searching Estatein properties', 'estatein-assessment' ); ?>"><?php esc_html_e( 'Read More', 'estatein-assessment' ); ?><span class="screen-reader-text"> <?php esc_html_e( 'about searching Estatein properties', 'estatein-assessment' ); ?></span></a></article>
				<article class="faq-card card"><h3><?php esc_html_e( 'What documents do I need to sell my property through Estatein?', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Find out about the necessary documentation for listing your property with us.', 'estatein-assessment' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#selling" aria-label="<?php esc_attr_e( 'Read more about selling a property with Estatein', 'estatein-assessment' ); ?>"><?php esc_html_e( 'Read More', 'estatein-assessment' ); ?><span class="screen-reader-text"> <?php esc_html_e( 'about selling a property with Estatein', 'estatein-assessment' ); ?></span></a></article>
				<article class="faq-card card"><h3><?php esc_html_e( 'How can I contact an Estatein agent?', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Discover the different ways you can get in touch with our experienced agents.', 'estatein-assessment' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form" aria-label="<?php esc_attr_e( 'Read more about contacting an Estatein agent', 'estatein-assessment' ); ?>"><?php esc_html_e( 'Read More', 'estatein-assessment' ); ?><span class="screen-reader-text"> <?php esc_html_e( 'about contacting an Estatein agent', 'estatein-assessment' ); ?></span></a></article>
			</div>
			<?php estatein_section_pager( '10', estatein_route_url( 'contact' ) . '#contact-form', __( 'View all frequently asked questions', 'estatein-assessment' ), __( 'View All FAQ’s', 'estatein-assessment' ) ); ?>
		</div>
	</section>
</main>
<?php
get_footer();
