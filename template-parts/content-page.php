<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header mb-4 px-5 md:px-8 space-y-8 mb-12">
        <h1 class="entry-title text-4xl md:text-7xl leading-tight mb-2">
		    <?php the_title(); ?>
        </h1>
    </header>

	<?php if( has_post_thumbnail() ) : ?>
    <figure class="max-w-3xl mx-auto mb-8">
        <a class="block aspect-[16/9] md:aspect-[16/5] xl:aspect-[16/8]" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1"
           style="background: url(<?php echo get_the_post_thumbnail_url( null, 'large'); ?>) center center; background-size: cover">
        </a>
    </figure>
	<?php else : ?>
    <hr class="border-b-1 border-white my-12 hidden"/>
	<?php endif; ?>

    <div class="entry-content prose px-5 md:text-lg xl:text-xl max-w-3xl mx-auto">
        <?php the_content(); ?>

	    <?php if( is_page(['start-here', 'now']) ) : ?>
        <p>
            <time datetime="<?php echo the_modified_date( 'c' ); ?>"
                  itemprop="dateUpdated" class="text-sm text-gray-700">
                Updated: <?php echo the_modified_date(); ?>
            </time>
        </p>
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