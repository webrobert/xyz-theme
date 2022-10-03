<button onclick="history.back()"
        class="ml-5 md:ml-8 mb-2 xl:absolute top-2 left-12 border rounded-xl border-gray-300
        cursor-pointer py-2 px-4 flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
    </svg>
    <span>Back</span>
</button>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header mb-4 px-5 md:px-8 space-y-8 xl:pl-[20%]">
		<h1 class="entry-title text-4xl md:text-6xl font-semibold leading-tight mb-2">
            <?php the_title(); ?>
        </h1>

        <div class="flex gap-6 xl:gap-8 text-base text-gray-700 uppercase">
		    <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished">
                <?php echo get_the_date('n.j.Y'); ?>
            </time>
            <div class="read-time"><?php post_read_time(); ?></div>
        </div>

    </header>

	<?php if( has_post_thumbnail() ) : ?>
    <figure x-data="{ open: false }" class="sm:px-5 md:pl-[20%] xl:pl-[20%] sm:max-w-4xl xl:max-w-none xl:pr-12 mb-10">
        <div x-on:click="open = ! open" class="md:aspect-[16/5] xl:aspect-[16/8] bg-cover bg-no-repeat bg-center cursor-pointer xl:cursor-default"
             style="background-image: url(<?php echo get_the_post_thumbnail_url( null, 'large'); ?>)">
            <img :class="open ? 'xl:hidden' : 'md:hidden'" alt="feature image"
                 src="<?php echo get_the_post_thumbnail_url( null, 'large'); ?>" />
        </div>
    </figure>
	<?php else : ?>
    <hr class="border-b-1 border-white my-12"/>
    <?php endif; ?>

    <div class="entry-content prose px-5 md:pl-[20%] xl:pl-[30%] md:text-lg xl:text-xl max-w-content md:max-w-4xl xl:max-w-6xl">
		<?php the_content(); ?>

		<?php wp_link_pages([
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'tailpress' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'tailpress' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		]); ?>
	</div>
</article>