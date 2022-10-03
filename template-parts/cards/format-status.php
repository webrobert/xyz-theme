<article id="post-<?php the_ID(); ?>" <?php post_class('status block aspect-[9/6] relative flex flex-col justify-between rounded-lg'); ?>>
    <div class="py-4 space-y-2 flex flex-col grow relative justify-between">

        <div class="entry-summary px-4 flex items-center relative">
            <a class="absolute inset-0" href="<?php echo get_permalink(); ?>" rel="bookmark"></a>
            <div class="prose max-h-[180px] overflow-hidden text-sm">
	            <?php the_excerpt(); ?>
            </div>
        </div>

	    <?php get_template_part( 'template-parts/meta-card' ); ?>

    </div>
</article>
