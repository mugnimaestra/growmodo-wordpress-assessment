<?php
/**
 * Estatein assessment theme functions.
 *
 * @package EstateinAssessment
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const ESTATEIN_THEME_VERSION = '1.0.0';

/**
 * Register theme features.
 */
function estatein_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'estatein-assessment' ),
		)
	);
}
add_action( 'after_setup_theme', 'estatein_theme_setup' );

/**
 * Load theme assets.
 */
function estatein_enqueue_assets() {
	wp_enqueue_style(
		'estatein-font',
		'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap',
		array(),
		null
	);
	wp_enqueue_style(
		'estatein-style',
		get_stylesheet_uri(),
		array( 'estatein-font' ),
		(string) filemtime( get_stylesheet_directory() . '/style.css' )
	);
	wp_enqueue_script(
		'estatein-theme',
		get_template_directory_uri() . '/assets/js/theme.js',
		array(),
		(string) filemtime( get_template_directory() . '/assets/js/theme.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'estatein_enqueue_assets' );

/**
 * Add preconnect hints for the font host.
 *
 * @param array  $urls          Existing hints.
 * @param string $relation_type Relation type.
 * @return array
 */
function estatein_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'estatein_resource_hints', 10, 2 );

/**
 * Register the assessment property and inquiry content models.
 */
function estatein_register_post_types() {
	register_post_type(
		'estatein_property',
		array(
			'labels' => array(
				'name'          => __( 'Properties', 'estatein-assessment' ),
				'singular_name' => __( 'Property', 'estatein-assessment' ),
				'add_new_item'  => __( 'Add Property', 'estatein-assessment' ),
				'edit_item'     => __( 'Edit Property', 'estatein-assessment' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'has_archive'  => 'properties',
			'rewrite'      => array( 'slug' => 'property' ),
			'menu_icon'    => 'dashicons-building',
			'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		)
	);

	register_post_type(
		'estatein_inquiry',
		array(
			'labels' => array(
				'name'          => __( 'Inquiries', 'estatein-assessment' ),
				'singular_name' => __( 'Inquiry', 'estatein-assessment' ),
			),
			'public'              => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'exclude_from_search' => true,
			'menu_icon'           => 'dashicons-email-alt',
			'supports'            => array( 'title', 'editor' ),
		)
	);
}
add_action( 'init', 'estatein_register_post_types' );

/**
 * Property field definitions.
 *
 * @return array<string,string>
 */
function estatein_property_fields() {
	return array(
		'location'  => __( 'Location', 'estatein-assessment' ),
		'price'     => __( 'Price (numeric USD)', 'estatein-assessment' ),
		'type'      => __( 'Property Type', 'estatein-assessment' ),
		'bedrooms'  => __( 'Bedrooms', 'estatein-assessment' ),
		'bathrooms' => __( 'Bathrooms', 'estatein-assessment' ),
		'area'      => __( 'Area', 'estatein-assessment' ),
		'year'      => __( 'Build Year', 'estatein-assessment' ),
		'amenities' => __( 'Amenities (one per line)', 'estatein-assessment' ),
		'visual'    => __( 'Visual Variant (1, 2, or 3)', 'estatein-assessment' ),
	);
}

/**
 * Add the property details meta box.
 */
function estatein_add_property_meta_box() {
	add_meta_box(
		'estatein-property-details',
		__( 'Property Details', 'estatein-assessment' ),
		'estatein_property_meta_box_markup',
		'estatein_property',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'estatein_add_property_meta_box' );

/**
 * Render property meta fields.
 *
 * @param WP_Post $post Current property.
 */
function estatein_property_meta_box_markup( $post ) {
	wp_nonce_field( 'estatein_save_property', 'estatein_property_nonce' );

	foreach ( estatein_property_fields() as $key => $label ) {
		$value = get_post_meta( $post->ID, '_estatein_' . $key, true );
		?>
		<p>
			<label for="estatein-<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $label ); ?></strong></label><br>
			<?php if ( 'amenities' === $key ) : ?>
				<textarea class="widefat" rows="5" id="estatein-<?php echo esc_attr( $key ); ?>" name="estatein_<?php echo esc_attr( $key ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
			<?php else : ?>
				<input class="widefat" id="estatein-<?php echo esc_attr( $key ); ?>" name="estatein_<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $value ); ?>">
			<?php endif; ?>
		</p>
		<?php
	}
}

/**
 * Save property metadata.
 *
 * @param int $post_id Current property ID.
 */
function estatein_save_property_meta( $post_id ) {
	if (
		! isset( $_POST['estatein_property_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_property_nonce'] ) ), 'estatein_save_property' ) ||
		! current_user_can( 'edit_post', $post_id ) ||
		( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	) {
		return;
	}

	foreach ( estatein_property_fields() as $key => $label ) {
		$field_name = 'estatein_' . $key;
		if ( ! isset( $_POST[ $field_name ] ) ) {
			continue;
		}

		$raw   = wp_unslash( $_POST[ $field_name ] );
		$value = 'amenities' === $key ? sanitize_textarea_field( $raw ) : sanitize_text_field( $raw );
		update_post_meta( $post_id, '_estatein_' . $key, $value );
	}
}
add_action( 'save_post_estatein_property', 'estatein_save_property_meta' );

/**
 * Read a property field with an escaped-display-safe default.
 *
 * @param int    $post_id Property ID.
 * @param string $key     Field key.
 * @param string $default Fallback.
 * @return string
 */
function estatein_property_meta( $post_id, $key, $default = '' ) {
	$value = get_post_meta( $post_id, '_estatein_' . $key, true );
	return '' !== $value ? (string) $value : $default;
}

/**
 * Format a numeric property price.
 *
 * @param int $post_id Property ID.
 * @return string
 */
function estatein_property_price( $post_id ) {
	$price = (float) estatein_property_meta( $post_id, 'price', '0' );
	return '$' . number_format_i18n( $price, 0 );
}

/**
 * Get a public route used by the fallback navigation.
 *
 * @param string $route Route key.
 * @return string
 */
function estatein_route_url( $route ) {
	if ( 'home' === $route ) {
		return home_url( '/' );
	}
	if ( 'properties' === $route ) {
		$link = get_post_type_archive_link( 'estatein_property' );
		return $link ? $link : home_url( '/properties/' );
	}

	$page = get_page_by_path( $route );
	return $page ? get_permalink( $page ) : home_url( '/' . trailingslashit( $route ) );
}

/**
 * Render fallback primary navigation.
 */
function estatein_fallback_menu() {
	$items = array(
		'home'       => __( 'Home', 'estatein-assessment' ),
		'about'      => __( 'About Us', 'estatein-assessment' ),
		'properties' => __( 'Properties', 'estatein-assessment' ),
		'services'   => __( 'Services', 'estatein-assessment' ),
	);

	echo '<ul class="primary-menu">';
	foreach ( $items as $route => $label ) {
		$is_current = ( 'home' === $route && is_front_page() ) ||
			( 'properties' === $route && ( is_post_type_archive( 'estatein_property' ) || is_singular( 'estatein_property' ) ) ) ||
			is_page( $route );
		printf(
			'<li><a class="%1$s" href="%2$s"%3$s>%4$s</a></li>',
			$is_current ? 'is-current' : '',
			esc_url( estatein_route_url( $route ) ),
			$is_current ? ' aria-current="page"' : '',
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/**
 * Render the Estatein logo.
 *
 * @param bool $compact Whether to omit the text label.
 */
function estatein_logo( $compact = false ) {
	?>
	<span class="brand-mark" aria-hidden="true">
		<svg viewBox="0 0 40 40" role="img" focusable="false">
			<path d="M20 2 38 20 20 38 2 20 20 2Z" fill="currentColor" opacity=".25"/>
			<path d="M20 7 33 20 20 33 7 20 20 7Z" fill="none" stroke="currentColor" stroke-width="4"/>
			<path d="m20 13 7 7-7 7-7-7 7-7Z" fill="currentColor"/>
		</svg>
	</span>
	<?php if ( ! $compact ) : ?>
		<span class="brand-name">Estatein</span>
	<?php endif; ?>
	<?php
}

/**
 * Render a compact section pager that matches the Estatein reference.
 *
 * @param string $total    Total-count label.
 * @param string $next_url Destination for the forward action.
 * @param string $next_label Accessible forward-action label.
 * @param string $link_text  Visible mobile view-all label.
 */
function estatein_section_pager( $total, $next_url, $next_label, $link_text ) {
	$count = sprintf( __( '01 of %s', 'estatein-assessment' ), $total );
	?>
	<div class="section-pager">
		<p class="section-pager__count"><strong>01</strong> <?php echo esc_html( sprintf( __( 'of %s', 'estatein-assessment' ), $total ) ); ?></p>
		<a class="section-pager__mobile-link button button--secondary" href="<?php echo esc_url( $next_url ); ?>"><?php echo esc_html( $link_text ); ?></a>
		<div class="section-pager__buttons">
			<button type="button" class="section-pager__button" aria-label="<?php esc_attr_e( 'Previous items', 'estatein-assessment' ); ?>" disabled>←</button>
			<span class="section-pager__mobile-count"><?php echo esc_html( $count ); ?></span>
			<a class="section-pager__button" href="<?php echo esc_url( $next_url ); ?>" aria-label="<?php echo esc_attr( $next_label ); ?>">→</a>
		</div>
	</div>
	<?php
}

/**
 * Output a short SEO description.
 */
function estatein_meta_description() {
	$description = get_bloginfo( 'description' );
	if ( is_singular() ) {
		$excerpt = get_the_excerpt();
		if ( $excerpt ) {
			$description = $excerpt;
		}
	}
	if ( ! $description ) {
		$description = __( 'Estatein helps buyers, sellers, and investors make confident real estate decisions.', 'estatein-assessment' );
	}
	printf( '<meta name="description" content="%s">' . "\n", esc_attr( wp_strip_all_tags( $description ) ) );
}
add_action( 'wp_head', 'estatein_meta_description', 1 );

/**
 * Apply property archive filters from safe GET parameters.
 *
 * @param WP_Query $query Main query.
 */
function estatein_filter_property_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! is_post_type_archive( 'estatein_property' ) ) {
		return;
	}

	$meta_query = array();

	if ( isset( $_GET['location'] ) && '' !== $_GET['location'] ) {
		$meta_query[] = array(
			'key'     => '_estatein_location',
			'value'   => sanitize_text_field( wp_unslash( $_GET['location'] ) ),
			'compare' => 'LIKE',
		);
	}
	if ( isset( $_GET['property_type'] ) && '' !== $_GET['property_type'] ) {
		$meta_query[] = array(
			'key'   => '_estatein_type',
			'value' => sanitize_text_field( wp_unslash( $_GET['property_type'] ) ),
		);
	}
	if ( isset( $_GET['min_price'] ) && is_numeric( $_GET['min_price'] ) ) {
		$meta_query[] = array(
			'key'     => '_estatein_price',
			'value'   => (float) $_GET['min_price'],
			'type'    => 'NUMERIC',
			'compare' => '>=',
		);
	}
	if ( isset( $_GET['property_size'] ) && '' !== $_GET['property_size'] ) {
		$meta_query[] = array(
			'key'     => '_estatein_area',
			'value'   => sanitize_text_field( wp_unslash( $_GET['property_size'] ) ),
			'compare' => 'LIKE',
		);
	}
	if ( isset( $_GET['build_year'] ) && preg_match( '/^\d{4}$/', (string) $_GET['build_year'] ) ) {
		$meta_query[] = array(
			'key'   => '_estatein_year',
			'value' => sanitize_text_field( wp_unslash( $_GET['build_year'] ) ),
		);
	}
	if ( $meta_query ) {
		$query->set( 'meta_query', $meta_query );
	}
	if ( isset( $_GET['property_search'] ) && '' !== $_GET['property_search'] ) {
		$query->set( 's', sanitize_text_field( wp_unslash( $_GET['property_search'] ) ) );
	}
	$query->set( 'posts_per_page', 9 );
	$query->set( 'orderby', 'ID' );
	$query->set( 'order', 'ASC' );
}
add_action( 'pre_get_posts', 'estatein_filter_property_archive' );

/**
 * Create a persistent inquiry from a frontend form.
 *
 * @param string $kind Form kind.
 * @param array  $data Sanitized fields.
 * @return int|WP_Error
 */
function estatein_store_inquiry( $kind, $data ) {
	$name  = trim( ( $data['first_name'] ?? '' ) . ' ' . ( $data['last_name'] ?? '' ) );
	$email = $data['email'] ?? '';
	$title = sprintf(
		/* translators: 1: inquiry type, 2: sender identity. */
		__( '%1$s — %2$s', 'estatein-assessment' ),
		ucfirst( $kind ),
		$name ? $name : $email
	);

	$post_id = wp_insert_post(
		array(
			'post_type'    => 'estatein_inquiry',
			'post_status'  => 'private',
			'post_title'   => $title,
			'post_content' => $data['message'] ?? '',
		),
		true
	);

	if ( is_wp_error( $post_id ) ) {
		return $post_id;
	}

	foreach ( $data as $key => $value ) {
		if ( 'message' === $key ) {
			continue;
		}
		update_post_meta( $post_id, '_estatein_' . sanitize_key( $key ), $value );
	}
	update_post_meta( $post_id, '_estatein_kind', $kind );

	return $post_id;
}

/**
 * Redirect back to a form with a status marker.
 *
 * @param string $status Status value.
 * @param string $anchor Anchor without #.
 */
function estatein_form_redirect( $status, $anchor = '' ) {
	$target = wp_get_referer();
	if ( ! $target ) {
		$target = home_url( '/' );
	}
	$target = add_query_arg( 'form_status', sanitize_key( $status ), $target );
	if ( $anchor ) {
		$target .= '#' . rawurlencode( $anchor );
	}
	wp_safe_redirect( $target );
	exit;
}

/**
 * Handle contact and property inquiry forms.
 */
function estatein_handle_inquiry() {
	if (
		! isset( $_POST['estatein_form_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_form_nonce'] ) ), 'estatein_submit_inquiry' )
	) {
		estatein_form_redirect( 'invalid', 'contact-form' );
	}

	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	if ( ! is_email( $email ) ) {
		estatein_form_redirect( 'invalid', 'contact-form' );
	}

	$data = array(
		'first_name'    => isset( $_POST['first_name'] ) ? sanitize_text_field( wp_unslash( $_POST['first_name'] ) ) : '',
		'last_name'     => isset( $_POST['last_name'] ) ? sanitize_text_field( wp_unslash( $_POST['last_name'] ) ) : '',
		'email'         => $email,
		'phone'         => isset( $_POST['phone'] ) ? sanitize_text_field( wp_unslash( $_POST['phone'] ) ) : '',
		'message'       => isset( $_POST['message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['message'] ) ) : '',
		'inquiry_type'  => isset( $_POST['inquiry_type'] ) ? sanitize_text_field( wp_unslash( $_POST['inquiry_type'] ) ) : '',
		'source'        => isset( $_POST['source'] ) ? sanitize_text_field( wp_unslash( $_POST['source'] ) ) : '',
		'property_id'   => isset( $_POST['property_id'] ) ? absint( $_POST['property_id'] ) : 0,
		'property_name' => isset( $_POST['property_name'] ) ? sanitize_text_field( wp_unslash( $_POST['property_name'] ) ) : '',
	);

	$kind   = $data['property_id'] ? 'property inquiry' : 'contact inquiry';
	$result = estatein_store_inquiry( $kind, $data );
	if ( is_wp_error( $result ) ) {
		estatein_form_redirect( 'error', 'contact-form' );
	}

	$subject = sprintf( '[Estatein] %s from %s', ucfirst( $kind ), $email );
	$message = $data['message'] . "\n\n" . wp_json_encode( $data, JSON_PRETTY_PRINT );
	wp_mail( get_option( 'admin_email' ), $subject, $message );

	estatein_form_redirect( 'success', 'contact-form' );
}
add_action( 'admin_post_nopriv_estatein_inquiry', 'estatein_handle_inquiry' );
add_action( 'admin_post_estatein_inquiry', 'estatein_handle_inquiry' );

/**
 * Handle newsletter signups as lightweight inquiries.
 */
function estatein_handle_newsletter() {
	if (
		! isset( $_POST['estatein_newsletter_nonce'] ) ||
		! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['estatein_newsletter_nonce'] ) ), 'estatein_newsletter' )
	) {
		estatein_form_redirect( 'invalid', 'newsletter' );
	}
	$email = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
	if ( ! is_email( $email ) ) {
		estatein_form_redirect( 'invalid', 'newsletter' );
	}

	$result = estatein_store_inquiry(
		'newsletter',
		array(
			'email'   => $email,
			'message' => __( 'Newsletter signup', 'estatein-assessment' ),
		)
	);

	estatein_form_redirect( is_wp_error( $result ) ? 'error' : 'success', 'newsletter' );
}
add_action( 'admin_post_nopriv_estatein_newsletter', 'estatein_handle_newsletter' );
add_action( 'admin_post_estatein_newsletter', 'estatein_handle_newsletter' );

/**
 * Seed a small, editable demo dataset on theme activation.
 *
 * This avoids a manual admin setup step for the recruitment review while
 * keeping the frontend backed by normal WordPress content.
 */
function estatein_seed_demo_content() {
	estatein_register_post_types();

	$pages = array(
		'home'     => array( 'title' => 'Home', 'content' => 'Estatein real estate landing page.' ),
		'about'    => array( 'title' => 'About Us', 'content' => 'Estatein helps people make confident property decisions.' ),
		'services' => array( 'title' => 'Services', 'content' => 'Property selling, management, and investment advisory services.' ),
		'contact'  => array( 'title' => 'Contact', 'content' => 'Contact Estatein for property guidance.' ),
	);

	$page_ids = array();
	foreach ( $pages as $slug => $page ) {
		$existing = get_page_by_path( $slug );
		if ( $existing ) {
			$page_ids[ $slug ] = $existing->ID;
			continue;
		}
		$page_ids[ $slug ] = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_title'   => $page['title'],
				'post_name'    => $slug,
				'post_content' => $page['content'],
			)
		);
	}

	if ( ! empty( $page_ids['home'] ) && ! is_wp_error( $page_ids['home'] ) ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', (int) $page_ids['home'] );
	}

	$properties = array(
		array(
			'title'       => 'Seaside Serenity Villa',
			'excerpt'     => 'A stunning four-bedroom villa with expansive ocean views and calm coastal living.',
			'content'     => 'Wake up to the soothing sound of waves in this refined coastal villa. Open living spaces, natural light, and a private outdoor area make it ideal for relaxed everyday living and entertaining.',
			'location'    => 'Malibu, California',
			'price'       => '1250000',
			'type'        => 'Villa',
			'bedrooms'    => '4',
			'bathrooms'   => '3',
			'area'        => '2,500 sq ft',
			'year'        => '2021',
			'visual'      => '1',
			'amenities'   => "Ocean view\nPrivate terrace\nTwo-car garage\nSmart climate control",
		),
		array(
			'title'       => 'Metropolitan Haven',
			'excerpt'     => 'A contemporary city residence close to dining, culture, transit, and business districts.',
			'content'     => 'Designed for modern city life, Metropolitan Haven combines a practical layout with generous natural light, premium finishes, and a location that keeps daily essentials within easy reach.',
			'location'    => 'New York, New York',
			'price'       => '550000',
			'type'        => 'Apartment',
			'bedrooms'    => '3',
			'bathrooms'   => '2',
			'area'        => '1,650 sq ft',
			'year'        => '2020',
			'visual'      => '2',
			'amenities'   => "City skyline view\nResident lounge\nSecure parking\n24-hour concierge",
		),
		array(
			'title'       => 'Rustic Retreat Cottage',
			'excerpt'     => 'A quiet countryside cottage set among rolling hills with warm, natural interiors.',
			'content'     => 'Find space to slow down in a cottage surrounded by open countryside. Natural materials, a generous garden, and flexible indoor spaces create a comfortable retreat for weekends or full-time living.',
			'location'    => 'Austin, Texas',
			'price'       => '350000',
			'type'        => 'Cottage',
			'bedrooms'    => '3',
			'bathrooms'   => '2',
			'area'        => '1,900 sq ft',
			'year'        => '2018',
			'visual'      => '3',
			'amenities'   => "Large garden\nFireplace\nWorkshop\nCountryside views",
		),
	);

	foreach ( $properties as $property ) {
		$existing = get_posts(
			array(
				'post_type'      => 'estatein_property',
				'post_status'    => 'any',
				'title'          => $property['title'],
				'fields'         => 'ids',
				'posts_per_page' => 1,
			)
		);
		if ( $existing ) {
			continue;
		}

		$post_id = wp_insert_post(
			array(
				'post_type'    => 'estatein_property',
				'post_status'  => 'publish',
				'post_title'   => $property['title'],
				'post_excerpt' => $property['excerpt'],
				'post_content' => $property['content'],
			)
		);

		if ( is_wp_error( $post_id ) ) {
			continue;
		}
		foreach ( estatein_property_fields() as $key => $label ) {
			if ( isset( $property[ $key ] ) ) {
				update_post_meta( $post_id, '_estatein_' . $key, $property[ $key ] );
			}
		}
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'estatein_seed_demo_content' );

/**
 * Read frontend form status for an accessible notice.
 *
 * @return string
 */
function estatein_form_notice() {
	if ( ! isset( $_GET['form_status'] ) ) {
		return '';
	}
	$status = sanitize_key( wp_unslash( $_GET['form_status'] ) );
	$copy   = array(
		'success' => __( 'Thanks. Your request was saved successfully.', 'estatein-assessment' ),
		'invalid' => __( 'Please check the required fields and try again.', 'estatein-assessment' ),
		'error'   => __( 'We could not save your request. Please try again.', 'estatein-assessment' ),
	);
	return $copy[ $status ] ?? '';
}
