<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support( 'post-formats', [
		'quote',
		'aside',
		'image',
		'status',
		'link'
	]);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );

}

add_action( 'after_setup_theme', 'tailpress_setup' );


/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

function register_custom_widget_area() {
    register_sidebar(
        array(
            'id' => 'new-widget-area',
            'name' => esc_html__( 'My new widget area', 'theme-domain' ),
            'description' => esc_html__( 'A new widget area made for testing purposes', 'theme-domain' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
            'after_title' => '</h3></div>'
        )
    );
}
add_action( 'widgets_init', 'register_custom_widget_area' );


if ( ! function_exists( 'twenty_twenty_one_post_thumbnail' ) ) {
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     *
     * @since Twenty Twenty-One 1.0
     *
     * @return void
     */
    function twenty_twenty_one_post_thumbnail() {
//        if ( ! twenty_twenty_one_can_show_post_thumbnail() ) {
//            return;
//        }
        ?>

        <?php if ( is_singular() ) : ?>

            <figure class="post-thumbnail">
                <?php
                // Lazy-loading attributes should be skipped for thumbnails since they are immediately in the viewport.
                the_post_thumbnail( 'large', array( 'loading' => false ) );
                ?>
                <?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
                    <figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
                <?php endif; ?>
            </figure><!-- .post-thumbnail -->

        <?php else : ?>

            <figure class="post-thumbnail">
                <a class="post-thumbnail-inner alignwide" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                    <?php the_post_thumbnail( 'large' ); //'post-thumbnail'?>
                </a>
                <?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
                    <figcaption class="wp-caption-text"><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
                <?php endif; ?>
            </figure>

        <?php endif; ?>
        <?php
    }
}

if ( ! function_exists( 'twenty_twenty_one_the_posts_navigation' ) ) {
    /**
     * Print the next and previous posts navigation.
     *
     * @since Twenty Twenty-One 1.0
     *
     * @return void
     */
    function twenty_twenty_one_the_posts_navigation() {
        the_posts_pagination(
            array(
                'before_page_number' => esc_html__( 'Page', 'twentytwentyone' ) . ' ',
                'mid_size'           => 0,
                'prev_text'          => sprintf(
                    '%s <span class="nav-prev-text text-blue-500">%s</span>',
                    is_rtl() ? 'arrow_left' : 'arrow_right',
                    wp_kses(
                        __( 'Newer <span class="nav-short">posts</span>', 'twentytwentyone' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    )
                ),
                'next_text'          => sprintf(
                    '<span class="nav-next-text text-blue-500">%s</span> %s',
                    wp_kses(
                        __( 'Older <span class="nav-short">posts</span>', 'twentytwentyone' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    is_rtl() ? 'arrow_left' : 'arrow_right'
                ),
            )
        );
    }
}

/*
 * title mods for archives and pages
 */

// remove "Private: " from titles
function remove_private_prefix($title) {
	return str_replace('Private: ', '', $title);
}
add_filter('the_title', 'remove_private_prefix');

// remove prefixes from archives
function my_theme_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );