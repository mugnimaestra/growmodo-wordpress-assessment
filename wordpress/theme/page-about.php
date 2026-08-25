<?php
/**
 * About page template.
 *
 * @package EstateinAssessment
 */

get_header();
?>
<main id="main-content" class="about-page">
	<section id="journey" class="section">
		<div class="site-shell journey-grid">
			<div>
				<p class="eyebrow"><?php esc_html_e( 'Our story', 'estatein-assessment' ); ?></p>
				<h1><?php esc_html_e( 'Our Journey', 'estatein-assessment' ); ?></h1>
				<p><?php esc_html_e( 'Our story is one of continuous growth and evolution. Estatein started with a simple goal: make property decisions easier to understand, easier to compare, and easier to act on.', 'estatein-assessment' ); ?></p>
				<div class="stats-grid">
					<div class="stat-card"><strong>200+</strong><span><?php esc_html_e( 'Happy Customers', 'estatein-assessment' ); ?></span></div>
					<div class="stat-card"><strong>10k+</strong><span><?php esc_html_e( 'Properties For Clients', 'estatein-assessment' ); ?></span></div>
					<div class="stat-card"><strong>16+</strong><span><?php esc_html_e( 'Years of Experience', 'estatein-assessment' ); ?></span></div>
				</div>
			</div>
			<div class="about-visual" role="img" aria-label="<?php esc_attr_e( 'Estatein architecture illustration', 'estatein-assessment' ); ?>"></div>
		</div>
	</section>

	<section id="values" class="section section--no-top">
		<div class="site-shell journey-grid">
			<div>
				<p class="section-heading__eyebrow"><?php esc_html_e( 'How we work', 'estatein-assessment' ); ?></p>
				<h2><?php esc_html_e( 'Our Values', 'estatein-assessment' ); ?></h2>
				<p><?php esc_html_e( 'We build every client relationship around clarity, practical expertise, and respect for the importance of a property decision.', 'estatein-assessment' ); ?></p>
			</div>
			<div class="value-grid card">
				<article class="value-item"><div class="value-item__title"><span class="icon-disc">◇</span><h3><?php esc_html_e( 'Trust', 'estatein-assessment' ); ?></h3></div><p><?php esc_html_e( 'Trust is the cornerstone of every successful real estate transaction.', 'estatein-assessment' ); ?></p></article>
				<article class="value-item"><div class="value-item__title"><span class="icon-disc">✦</span><h3><?php esc_html_e( 'Excellence', 'estatein-assessment' ); ?></h3></div><p><?php esc_html_e( 'We set a high bar for the properties we present and the service we provide.', 'estatein-assessment' ); ?></p></article>
				<article class="value-item"><div class="value-item__title"><span class="icon-disc">◎</span><h3><?php esc_html_e( 'Client-Centric', 'estatein-assessment' ); ?></h3></div><p><?php esc_html_e( 'Your goals and constraints shape the advice, search, and next steps.', 'estatein-assessment' ); ?></p></article>
				<article class="value-item"><div class="value-item__title"><span class="icon-disc">✓</span><h3><?php esc_html_e( 'Our Commitment', 'estatein-assessment' ); ?></h3></div><p><?php esc_html_e( 'We stay engaged from the first conversation through a confident decision.', 'estatein-assessment' ); ?></p></article>
			</div>
		</div>
	</section>

	<section class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'Milestones', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( 'Our Achievements', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'Our progress is measured by better client outcomes, deeper market knowledge, and long-term relationships.', 'estatein-assessment' ); ?></p></div></div>
			<div class="grid grid--3">
				<article class="achievement-card card"><h3><?php esc_html_e( '3+ Years of Excellence', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Focused experience has helped Estatein become a practical resource for buyers, sellers, and investors.', 'estatein-assessment' ); ?></p></article>
				<article class="achievement-card card"><h3><?php esc_html_e( 'Happy Clients', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Client success stories are the clearest signal that our process and advice create value.', 'estatein-assessment' ); ?></p></article>
				<article class="achievement-card card"><h3><?php esc_html_e( 'Industry Recognition', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Our standards for clarity and service continue to earn trust from partners and peers.', 'estatein-assessment' ); ?></p></article>
			</div>
		</div>
	</section>

	<section class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'A clear process', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( 'Discover a World of Possibilities', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'A simple six-step journey keeps choices understandable and next actions visible.', 'estatein-assessment' ); ?></p></div></div>
			<div class="step-grid">
				<article class="step-card"><div class="step-card__inner"><h3><?php esc_html_e( 'Discover Properties', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Browse listings and use practical filters to identify homes that fit your priorities.', 'estatein-assessment' ); ?></p></div></article>
				<article class="step-card"><div class="step-card__inner"><h3><?php esc_html_e( 'Narrowing Down Your Choices', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Compare the strongest options and focus on the trade-offs that matter most to you.', 'estatein-assessment' ); ?></p></div></article>
				<article class="step-card"><div class="step-card__inner"><h3><?php esc_html_e( 'Personalized Guidance', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Ask questions and get context from a real estate specialist before you commit time or money.', 'estatein-assessment' ); ?></p></div></article>
				<article class="step-card"><div class="step-card__inner"><h3><?php esc_html_e( 'See It for Yourself', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Arrange property viewings and inspect the details that cannot be understood from a listing alone.', 'estatein-assessment' ); ?></p></div></article>
				<article class="step-card"><div class="step-card__inner"><h3><?php esc_html_e( 'Making Informed Decisions', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Review pricing, legal, financing, and inspection considerations before making an offer.', 'estatein-assessment' ); ?></p></div></article>
				<article class="step-card"><div class="step-card__inner"><h3><?php esc_html_e( 'Getting the Best Deal', 'estatein-assessment' ); ?></h3><p><?php esc_html_e( 'Use market evidence and experienced negotiation support to move toward a fair transaction.', 'estatein-assessment' ); ?></p></div></article>
			</div>
		</div>
	</section>

	<section id="team" class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'People behind Estatein', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( 'Meet the Estatein Team', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'Our results depend on the people who combine market context, operational discipline, and client care every day.', 'estatein-assessment' ); ?></p></div></div>
			<div class="grid grid--4">
				<?php
				$team = array(
					array( 'name' => 'Max Mitchell', 'role' => 'Founder' ),
					array( 'name' => 'David Brown', 'role' => 'Head of Property Management' ),
					array( 'name' => 'Sarah Johnson', 'role' => 'Chief Real Estate Officer' ),
					array( 'name' => 'Michael Turner', 'role' => 'Legal Counsel' ),
				);
				foreach ( $team as $member ) :
					?>
					<article class="team-card card"><div class="team-portrait" role="img" aria-label="<?php echo esc_attr( $member['name'] ); ?>"></div><h3><?php echo esc_html( $member['name'] ); ?></h3><p><?php echo esc_html( $member['role'] ); ?></p><span class="team-social"><?php esc_html_e( 'Say Hello 👋', 'estatein-assessment' ); ?></span></article>
					<?php
				endforeach;
				?>
			</div>
		</div>
	</section>

	<section class="section section--no-top">
		<div class="site-shell">
			<div class="section-heading"><div class="section-heading__copy"><p class="section-heading__eyebrow"><?php esc_html_e( 'Trusted partnerships', 'estatein-assessment' ); ?></p><h2><?php esc_html_e( 'Our Valued Clients', 'estatein-assessment' ); ?></h2><p><?php esc_html_e( 'Estatein supports organizations with property decisions that connect directly to growth and operations.', 'estatein-assessment' ); ?></p></div></div>
			<div class="grid grid--2">
				<article class="client-card card"><span class="meta-label"><?php esc_html_e( 'Since 2019', 'estatein-assessment' ); ?></span><h3>ABC Corporation</h3><div class="client-card__meta"><div><span class="meta-label"><?php esc_html_e( 'Domain', 'estatein-assessment' ); ?></span><strong><?php esc_html_e( 'Commercial Real Estate', 'estatein-assessment' ); ?></strong></div><div><span class="meta-label"><?php esc_html_e( 'Category', 'estatein-assessment' ); ?></span><strong><?php esc_html_e( 'Luxury Home Development', 'estatein-assessment' ); ?></strong></div></div><span class="meta-label"><?php esc_html_e( 'What They Said 🤗', 'estatein-assessment' ); ?></span><p><?php esc_html_e( 'Estatein understood the operational constraints behind our search and helped us compare locations with much more confidence.', 'estatein-assessment' ); ?></p></article>
				<article class="client-card card"><span class="meta-label"><?php esc_html_e( 'Since 2018', 'estatein-assessment' ); ?></span><h3>GreenTech Enterprises</h3><div class="client-card__meta"><div><span class="meta-label"><?php esc_html_e( 'Domain', 'estatein-assessment' ); ?></span><strong><?php esc_html_e( 'Retail Space', 'estatein-assessment' ); ?></strong></div><div><span class="meta-label"><?php esc_html_e( 'Category', 'estatein-assessment' ); ?></span><strong><?php esc_html_e( 'Sustainable Operations', 'estatein-assessment' ); ?></strong></div></div><span class="meta-label"><?php esc_html_e( 'What They Said 🤗', 'estatein-assessment' ); ?></span><p><?php esc_html_e( 'The team kept our expansion goals and budget visible throughout the search, which made decisions faster and easier to explain internally.', 'estatein-assessment' ); ?></p></article>
			</div>
		</div>
	</section>
</main>
<?php get_footer();
