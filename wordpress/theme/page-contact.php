<?php
/**
 * Contact page template.
 *
 * @package EstateinAssessment
 */

get_header();
?>
<main id="main-content" class="contact-page">
	<section class="page-hero">
		<div class="site-shell page-hero__copy">
			<p class="eyebrow"><?php esc_html_e( 'Talk to Estatein', 'estatein-assessment' ); ?></p>
			<h1><?php esc_html_e( 'Get in Touch with Estatein', 'estatein-assessment' ); ?></h1>
			<p><?php esc_html_e( 'Whether you are searching, selling, managing, or investing, start with the channel that is easiest for you and tell us what you need.', 'estatein-assessment' ); ?></p>
		</div>
	</section>

	<section class="contact-channels" aria-label="<?php esc_attr_e( 'Contact channels', 'estatein-assessment' ); ?>">
		<a class="contact-channel card" href="mailto:info@estatein.com"><span class="icon-disc">✉</span><p>info@estatein.com</p></a>
		<a class="contact-channel card" href="tel:+11234567890"><span class="icon-disc">☎</span><p>+1 (123) 456-7890</p></a>
		<a class="contact-channel card" href="#offices"><span class="icon-disc">⌖</span><p><?php esc_html_e( 'Main Headquarters', 'estatein-assessment' ); ?></p></a>
		<a class="contact-channel card" href="#"><span class="icon-disc">↗</span><p><?php esc_html_e( 'Instagram · LinkedIn · Facebook', 'estatein-assessment' ); ?></p></a>
	</section>

	<section class="section">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'Start a conversation', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( "Let's Connect", 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'Share enough context for the team to understand your request. Submissions are saved in the WordPress admin as private inquiries.', 'estatein-assessment' ); ?></p></div></div>
			<div id="contact-form" class="form-shell card">
				<?php if ( estatein_form_notice() ) : ?><p class="form-notice" role="status"><?php echo esc_html( estatein_form_notice() ); ?></p><?php endif; ?>
				<form class="form-grid" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
					<input type="hidden" name="action" value="estatein_inquiry">
					<?php wp_nonce_field( 'estatein_submit_inquiry', 'estatein_form_nonce' ); ?>
					<div class="field"><label for="contact-first-name"><?php esc_html_e( 'First Name', 'estatein-assessment' ); ?></label><input id="contact-first-name" name="first_name" autocomplete="given-name" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein-assessment' ); ?>" required></div>
					<div class="field"><label for="contact-last-name"><?php esc_html_e( 'Last Name', 'estatein-assessment' ); ?></label><input id="contact-last-name" name="last_name" autocomplete="family-name" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein-assessment' ); ?>"></div>
					<div class="field"><label for="contact-email"><?php esc_html_e( 'Email', 'estatein-assessment' ); ?></label><input id="contact-email" type="email" name="email" autocomplete="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein-assessment' ); ?>" required></div>
					<div class="field"><label for="contact-phone"><?php esc_html_e( 'Phone', 'estatein-assessment' ); ?></label><input id="contact-phone" name="phone" autocomplete="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein-assessment' ); ?>"></div>
					<div class="field"><label for="contact-type"><?php esc_html_e( 'Inquiry Type', 'estatein-assessment' ); ?></label><select id="contact-type" name="inquiry_type"><option value="Buying"><?php esc_html_e( 'Buying a Property', 'estatein-assessment' ); ?></option><option value="Selling"><?php esc_html_e( 'Selling a Property', 'estatein-assessment' ); ?></option><option value="Management"><?php esc_html_e( 'Property Management', 'estatein-assessment' ); ?></option><option value="Investment"><?php esc_html_e( 'Investment Advisory', 'estatein-assessment' ); ?></option></select></div>
					<div class="field"><label for="contact-source"><?php esc_html_e( 'How Did You Hear About Us?', 'estatein-assessment' ); ?></label><select id="contact-source" name="source"><option value="Search"><?php esc_html_e( 'Search Engine', 'estatein-assessment' ); ?></option><option value="Referral"><?php esc_html_e( 'Referral', 'estatein-assessment' ); ?></option><option value="Social"><?php esc_html_e( 'Social Media', 'estatein-assessment' ); ?></option><option value="Other"><?php esc_html_e( 'Other', 'estatein-assessment' ); ?></option></select></div>
					<div class="field field--full"><label for="contact-message"><?php esc_html_e( 'Message', 'estatein-assessment' ); ?></label><textarea id="contact-message" name="message" placeholder="<?php esc_attr_e( 'Enter your Message here..', 'estatein-assessment' ); ?>"></textarea></div>
					<div class="form-actions"><p><?php esc_html_e( 'By submitting, you agree that Estatein may contact you about this request.', 'estatein-assessment' ); ?></p><button class="button button--primary" type="submit"><?php esc_html_e( 'Send Your Message', 'estatein-assessment' ); ?></button></div>
				</form>
			</div>
		</div>
	</section>

	<section id="offices" class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'Visit us', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( 'Discover Our Office Locations', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'Meet the team at our main headquarters or regional office. Contact details are included before you travel.', 'estatein-assessment' ); ?></p></div></div>
			<div class="grid grid--2">
				<article class="office-card card"><span class="meta-label"><?php esc_html_e( 'Main Headquarters', 'estatein-assessment' ); ?></span><h3>123 Estatein Plaza, City Center, Metropolis</h3><div class="office-card__tags"><span class="pill"><?php esc_html_e( 'Metropolis', 'estatein-assessment' ); ?></span><span class="pill"><?php esc_html_e( 'Headquarters', 'estatein-assessment' ); ?></span></div><div class="office-contact"><span>✉ info@estatein.com</span><span>☎ +1 (123) 456-7890</span></div><p><?php esc_html_e( 'Our main office supports buying, selling, property management, and investment advisory services.', 'estatein-assessment' ); ?></p><a class="button button--primary" href="https://maps.google.com/?q=Metropolis" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Get Direction', 'estatein-assessment' ); ?></a></article>
				<article class="office-card card"><span class="meta-label"><?php esc_html_e( 'Regional Offices', 'estatein-assessment' ); ?></span><h3>456 Urban Avenue, Downtown District, Metropolis</h3><div class="office-card__tags"><span class="pill"><?php esc_html_e( 'Downtown', 'estatein-assessment' ); ?></span><span class="pill"><?php esc_html_e( 'Regional Office', 'estatein-assessment' ); ?></span></div><div class="office-contact"><span>✉ info@estatein.com</span><span>☎ +1 (123) 628-7890</span></div><p><?php esc_html_e( 'A convenient regional base for local appointments, property viewings, and owner support.', 'estatein-assessment' ); ?></p><a class="button button--primary" href="https://maps.google.com/?q=Metropolis" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Get Direction', 'estatein-assessment' ); ?></a></article>
			</div>
		</div>
	</section>

	<section class="section section--no-top">
		<div class="site-shell">
			<div class="world-gallery card">
				<div class="world-gallery__image" role="img" aria-label="<?php esc_attr_e( 'Estatein office architecture', 'estatein-assessment' ); ?>"></div>
				<div class="world-gallery__image" role="img" aria-label="<?php esc_attr_e( 'Estatein team workspace', 'estatein-assessment' ); ?>"></div>
				<div class="world-gallery__image" role="img" aria-label="<?php esc_attr_e( 'Estatein meeting space', 'estatein-assessment' ); ?>"></div>
				<div class="world-gallery__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'Behind the scenes', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( "Explore Estatein's World", 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'A real estate decision combines places, people, and careful work. Estatein brings those parts together in one guided experience.', 'estatein-assessment' ); ?></p></div>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
