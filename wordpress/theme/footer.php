<?php
/**
 * Theme footer.
 *
 * @package EstateinAssessment
 */
?>
<section class="journey-cta" aria-labelledby="journey-title">
	<div class="site-shell journey-cta__inner">
		<div>
			<h2 id="journey-title"><?php esc_html_e( 'Start Your Real Estate Journey Today', 'estatein-assessment' ); ?></h2>
			<p><?php esc_html_e( "Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.", 'estatein-assessment' ); ?></p>
		</div>
		<a class="button button--primary" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>"><?php esc_html_e( 'Explore Properties', 'estatein-assessment' ); ?></a>
	</div>
</section>
<footer class="site-footer">
	<div class="site-shell footer-grid">
		<div class="footer-brand">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php estatein_logo(); ?></a>
			<form id="newsletter" class="newsletter" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
				<input type="hidden" name="action" value="estatein_newsletter">
				<?php wp_nonce_field( 'estatein_newsletter', 'estatein_newsletter_nonce' ); ?>
				<label class="screen-reader-text" for="footer-email"><?php esc_html_e( 'Email address', 'estatein-assessment' ); ?></label>
				<input id="footer-email" type="email" name="email" autocomplete="email" placeholder="<?php esc_attr_e( 'Enter Your Email', 'estatein-assessment' ); ?>" required>
				<button type="submit" aria-label="<?php esc_attr_e( 'Join newsletter', 'estatein-assessment' ); ?>">→</button>
			</form>
		</div>
		<div>
			<h3><?php esc_html_e( 'Home', 'estatein-assessment' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( home_url( '/#featured-properties' ) ); ?>"><?php esc_html_e( 'Properties', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#testimonials' ) ); ?>"><?php esc_html_e( 'Testimonials', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"><?php esc_html_e( 'FAQ’s', 'estatein-assessment' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h3><?php esc_html_e( 'About Us', 'estatein-assessment' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( estatein_route_url( 'about' ) ); ?>#journey"><?php esc_html_e( 'Our Story', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( estatein_route_url( 'about' ) ); ?>#values"><?php esc_html_e( 'Our Values', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( estatein_route_url( 'about' ) ); ?>#team"><?php esc_html_e( 'Our Team', 'estatein-assessment' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h3><?php esc_html_e( 'Properties', 'estatein-assessment' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>"><?php esc_html_e( 'Portfolio', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>#property-search"><?php esc_html_e( 'Categories', 'estatein-assessment' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h3><?php esc_html_e( 'Services', 'estatein-assessment' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#selling"><?php esc_html_e( 'Property Selling', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#management"><?php esc_html_e( 'Property Management', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( estatein_route_url( 'services' ) ); ?>#investment"><?php esc_html_e( 'Investment Advisory', 'estatein-assessment' ); ?></a></li>
			</ul>
		</div>
		<div>
			<h3><?php esc_html_e( 'Contact Us', 'estatein-assessment' ); ?></h3>
			<ul>
				<li><a href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'Contact Form', 'estatein-assessment' ); ?></a></li>
				<li><a href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#offices"><?php esc_html_e( 'Our Offices', 'estatein-assessment' ); ?></a></li>
			</ul>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="site-shell footer-bottom__inner">
			<p>© 2023 Estatein. <?php esc_html_e( 'All Rights Reserved.', 'estatein-assessment' ); ?></p>
			<p><a href="#"><?php esc_html_e( 'Terms & Conditions', 'estatein-assessment' ); ?></a></p>
			<div class="social-links" aria-label="<?php esc_attr_e( 'Social links', 'estatein-assessment' ); ?>">
				<a href="#" aria-label="Facebook">f</a><a href="#" aria-label="LinkedIn">in</a><a href="#" aria-label="X">x</a><a href="#" aria-label="YouTube">▶</a>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
