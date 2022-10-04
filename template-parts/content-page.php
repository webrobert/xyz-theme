<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header mb-4 px-5 md:px-8 space-y-8 mb-12">
        <h1 class="entry-title text-4xl md:text-7xl leading-tight mb-2">
		    <?php the_title(); ?>
        </h1>
    </header>

	<?php if( has_post_thumbnail() ) : ?>
    <figure x-data="{ open: false }" class="max-w-3xl mx-auto mb-8">
        <div x-on:click="open = ! open" class="aspect-[16/9] md:aspect-[16/5] xl:aspect-[16/8] md:cursor-pointer"
             style="background: url(<?php echo get_the_post_thumbnail_url( null, 'large'); ?>) center center; background-size: cover">
            <img x-cloak :class="open ? '' : 'md:hidden'" alt="feature image"
                 src="<?php echo get_the_post_thumbnail_url( null, 'large'); ?>" />
        </div>
    </figure>
	<?php else : ?>
    <hr class="border-b-1 border-white my-12 hidden"/>
	<?php endif; ?>

    <div class="entry-content prose px-5 md:text-lg xl:text-xl max-w-3xl mx-auto">
        <?php the_content(); ?>

	    <?php if( is_page(['start-here', 'now']) ) : ?>
        <div class="text-sm text-gray-700 flex items-center gap-3">
            <span>Updated: <time class="inline-block" datetime="<?php echo the_modified_date( 'c' ); ?>" itemprop="dateUpdated">
                    <?php echo the_modified_date('m.d.Y'); ?></time></span>

            <?php if (current_location()) : ?>
            <span>Current Location: <map class="inline-block">
                    <?php echo current_location() ?></map></span>
            <?php endif; ?>
        </div>
	    <?php endif; ?>

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