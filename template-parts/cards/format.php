<article id="post-<?php the_ID(); ?>" <?php post_class('overflow-hidden rounded-lg aspect-[9/6] relative'); ?>>

    <div class="this-one select-none bg-cover bg-no-repeat bg-center rounded-lg absolute inset-0"
        <?php if ( has_post_thumbnail() ) printf( 'style="background-image: url(%s); z-index: 1"',
                   get_the_post_thumbnail_url( null, 'large') ); ?>>
        <div class="overlay absolute inset-0 rounded-lg hover:rounded-xl <?php echo has_post_thumbnail()
            ? 'image bg-purple-900 bg-opacity-70' : 'bg-blue-900 opacity-90'; ?>"></div>
    </div>

    <div class="absolute inset-0 flex flex-col justify-between z-10">
        <div class="flex p-4 text-white">
            <?php if( get_post_status() == 'private') : ?>
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
	        <?php endif; ?>

            <div class="text-sm opacity-80 ml-auto z-50"><?php post_read_time(); ?></div>
        </div>

        <div class="space-y-2 z-50 overflow-hidden my-4">
            <div class="_meta px-4">
                <time class="text-sm text-white uppercase flex gap-2 opacity-60"
                      datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished">
                    <?php echo get_the_date('M.d.Y'); ?>
                </time>
            </div>

            <h2 class="entry-title text-lg md:text-xl font-bold leading-tight px-4 text-white">
                <?php the_title( sprintf('<a href="%s" rel="bookmark">',
                    esc_url( get_permalink() ) ),'</a>'); ?>
            </h2>

            <?php if (! has_post_thumbnail() ) : ?>
            <div class="entry-summary text-sm px-4 prose max-h-[80px] overflow-hidden text-white opacity-70">
                <?php the_excerpt(); ?>
            </div>
            <?php endif; ?>
        </div>

    </div>

    <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1" class="absolute inset-0 z-10"></a>

</article>
