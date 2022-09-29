<div class="_meta flex justify-between text-xs items-center px-4 z-10">

	<time class="text-sm text-gray-500 flex gap-2 uppercase"
          datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished">
		<?php echo get_the_date('M.d.Y'); ?>
    </time>

	<span class="post-taxonomies uppercase relative flex items-center">
    <?php if( get_post_status() == 'private') : ?>
        <svg class="h-4 w-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
        </svg>
    <?php endif;
    $categories_list = get_the_category_list( wp_get_list_item_separator() );
    if ( $categories_list ) {
        printf( '<span class="cat-links text-blue-500 uppercase font-semibold">' .
            esc_html__( '%s', 'twentytwentyone' ) . ' </span>',
            $categories_list // phpcs:ignore WordPress.Security.EscapeOutput
        );
    } ?>
    </span>
</div>
