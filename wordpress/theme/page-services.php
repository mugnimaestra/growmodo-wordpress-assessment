<?php
/**
 * Services page template.
 *
 * @package EstateinAssessment
 */

get_header();
?>
<main id="main-content" class="services-page">
	<section class="page-hero">
		<div class="site-shell page-hero__copy">
			<p class="eyebrow"><?php esc_html_e( 'Expert support', 'estatein-assessment' ); ?></p>
			<h1><?php esc_html_e( 'Elevate Your Real Estate Experience', 'estatein-assessment' ); ?></h1>
			<p><?php esc_html_e( 'Welcome to Estatein, where property goals meet practical guidance. Explore services designed for buyers, owners, sellers, and investors.', 'estatein-assessment' ); ?></p>
		</div>
	</section>

	<section class="service-shortcuts" aria-label="<?php esc_attr_e( 'Estatein service categories', 'estatein-assessment' ); ?>">
		<a class="quick-link" href="<?php echo esc_url( estatein_route_url( 'properties' ) ); ?>"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">⌂</span><span><?php esc_html_e( 'Find Your Dream Home', 'estatein-assessment' ); ?></span></a>
		<a class="quick-link" href="#selling"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">◇</span><span><?php esc_html_e( 'Unlock Property Value', 'estatein-assessment' ); ?></span></a>
		<a class="quick-link" href="#management"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">▣</span><span><?php esc_html_e( 'Effortless Property Management', 'estatein-assessment' ); ?></span></a>
		<a class="quick-link" href="#investment"><span class="quick-link__arrow">↗</span><span class="quick-link__icon">⌁</span><span><?php esc_html_e( 'Smart Investments, Informed Decisions', 'estatein-assessment' ); ?></span></a>
	</section>

	<section id="selling" class="section">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'Property selling', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( 'Unlock Property Value', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'From valuation through closing, Estatein combines market evidence, clear positioning, and experienced negotiation to support a strong sale.', 'estatein-assessment' ); ?></p></div></div>
			<div class="service-section-grid">
				<article class="service-card card"><div class="service-card__icon">◇</div><h3><?php esc_html_e( 'Valuation Mastery', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Understand the likely market value of your property using relevant local evidence and comparable transactions.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">◎</div><h3><?php esc_html_e( 'Strategic Marketing', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Position the property with clear messaging, strong presentation, and distribution matched to the likely buyer profile.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">↔</div><h3><?php esc_html_e( 'Negotiation Wizardry', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Evaluate offers in context and negotiate terms that protect your priorities, not only the headline price.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">✓</div><h3><?php esc_html_e( 'Closing Success', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Keep documents, deadlines, counterparties, and final checks coordinated through the closing process.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card service-card--cta card"><div><h3><?php esc_html_e( 'Unlock the Value of Your Property Today', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Tell us about the property and your timeline. We can help define the next practical step.', 'estatein-assessment' ); ?></p></div><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'Learn More', 'estatein-assessment' ); ?></a></article>
			</div>
		</div>
	</section>

	<section id="management" class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'Property management', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( 'Effortless Property Management', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'Protect the owner experience and tenant experience with consistent operations, maintenance, financial visibility, and compliance support.', 'estatein-assessment' ); ?></p></div></div>
			<div class="service-section-grid">
				<article class="service-card card"><div class="service-card__icon">☺</div><h3><?php esc_html_e( 'Tenant Harmony', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Support a clear tenant journey with responsive communication and practical issue resolution.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">⚙</div><h3><?php esc_html_e( 'Maintenance Ease', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Coordinate routine upkeep and urgent maintenance while keeping owners informed about cost and urgency.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">$</div><h3><?php esc_html_e( 'Financial Peace of Mind', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Keep rent collection, operating expenses, and important property financials easy to review.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">§</div><h3><?php esc_html_e( 'Legal Guardian', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Stay aware of the agreements, records, and local obligations that support responsible property operations.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card service-card--cta card"><div><h3><?php esc_html_e( 'Experience Effortless Property Management', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Reduce operational friction while keeping ownership decisions visible and controlled.', 'estatein-assessment' ); ?></p></div><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'Learn More', 'estatein-assessment' ); ?></a></article>
			</div>
		</div>
	</section>

	<section id="investment" class="section section--no-top">
		<div class="site-shell investment-layout">
			<div>
				<p class="section-heading__eyebrow"><?php esc_html_e( 'Investment advisory', 'estatein-assessment' ); ?></p>
				<h2><?php esc_html_e( 'Smart Investments, Informed Decisions', 'estatein-assessment' ); ?></h2>
				<p><?php esc_html_e( 'Building a property portfolio needs a deliberate view of market conditions, return potential, concentration risk, and personal objectives.', 'estatein-assessment' ); ?></p>
				<div class="investment-note"><h3><?php esc_html_e( 'Unlock Your Investment Potential', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Start with your goals, expected holding period, available capital, and acceptable risk. Estatein can help turn those constraints into a practical property strategy.', 'estatein-assessment' ); ?></p><a class="button button--secondary" href="<?php echo esc_url( estatein_route_url( 'contact' ) ); ?>#contact-form"><?php esc_html_e( 'Learn More', 'estatein-assessment' ); ?></a></div>
			</div>
			<div class="grid grid--2">
				<article class="service-card card"><div class="service-card__icon">⌁</div><h3><?php esc_html_e( 'Market Insight', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Review local supply, demand, pricing movement, and rental conditions before committing capital.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">%</div><h3><?php esc_html_e( 'ROI Assessment', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Compare likely income, operating costs, acquisition costs, and downside scenarios using consistent assumptions.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">✦</div><h3><?php esc_html_e( 'Customized Strategies', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Match investment choices to your own return targets, liquidity needs, and appetite for operational involvement.', 'estatein-assessment' ); ?></p></article>
				<article class="service-card card"><div class="service-card__icon">◫</div><h3><?php esc_html_e( 'Diversification Mastery', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Avoid unnecessary concentration by considering property type, geography, tenant profile, and investment horizon.', 'estatein-assessment' ); ?></p></article>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
