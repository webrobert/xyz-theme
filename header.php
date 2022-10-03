<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
            </div>

            <?php wp_nav_menu([
                'container_id'    => 'primary-menu',
                'container_class' => 'border-t border-b border-white sm:border-none -mx-4 mt-4 pr-[100px] sm:mr-4 lg:mt-0 p-4 lg:p-0',
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
