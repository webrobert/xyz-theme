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

    <div class="flex items-center justify-center py-1 text-xs
                bg-white sm:bg-yellow-200 md:bg-green-200 lg:bg-blue-400 xl:bg-purple-300">
        <span class="sm:hidden">mobile</span>
        <span class="hidden sm:block md:hidden">sm:small</span>
        <span class="hidden md:block lg:hidden">md:medium</span>
        <span class="hidden lg:block xl:hidden">lg:large</span>
        <span class="hidden xl:block">xl:extra large</span>
    </div>

	<?php do_action( 'tailpress_header' ); ?>

	<header class="md:px-4 sm:flex justify-between items-center border-b overflow-hidden flex-wrap">
        <div class="pr-10">
        <?php if ( has_custom_logo() ) :

             the_custom_logo();

            else : ?>
            <div class="text-lg uppercase ml-4 py-6">
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

        <?php wp_nav_menu([
            'container_id'    => 'primary-menu',
            'container_class' => 'border-t border-b border-white sm:border-none -mx-4 p-4 pr-[100px] sm:ml-0 sm:mr-2 sm:p-0',
            'menu_class'      => 'flex',
            'theme_location'  => 'primary',
            'li_class'        => 'mx-4 flex-none',
            'fallback_cb'     => false,
        ]); ?>
	</header>

	<div id="content" class="site-content flex-grow">

		<?php do_action( 'tailpress_content_start' ); ?>

		<main>
