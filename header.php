<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-gray-200 text-gray-900 antialiased' ); ?>>

<?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

	<header class="sm:px-4">
        <div class="lg:flex lg:justify-between lg:items-center border-b py-6 overflow-hidden">
            <div class="flex justify-between items-center">
                <div>
                <?php if ( has_custom_logo() ) :

                     the_custom_logo();

                    else : ?>
                    <div class="text-lg uppercase ml-4">
                        <a href="<?php echo get_bloginfo( 'url' ); ?>"
                           class="font-extrabold text-lg uppercase">
                            <?php echo get_bloginfo( 'name' ); ?>
                        </a>
                    </div>

                    <p class="text-sm font-light text-gray-600">
                        <?php echo get_bloginfo( 'description' ); ?>
                    </p>

                <?php endif; ?>
                </div>

                <!--
                <div class="hidden">
                    <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
                        <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                                <g id="icon-shape">
                                    <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
                                          id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
                -->
            </div>

            <?php wp_nav_menu([
                'container_id'    => 'primary-menu',
                'container_class' => 'border-t border-b border-white sm:border-none -mx-4 mt-4 sm:mr-4 lg:mt-0 p-4 lg:p-0',
                'menu_class'      => 'flex',
                'theme_location'  => 'primary',
                'li_class'        => 'mx-4 flex-none',
                'fallback_cb'     => false,
            ]); ?>
        </div>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
