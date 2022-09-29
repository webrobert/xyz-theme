<?php get_header(); ?>

	<div class="my-8 mt-4 sm:mt-8 mx-auto relative">
	<?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();

            // echo $format = get_post_format() ? : 'standard';

            get_template_part( 'template-parts/content', get_post_type() );

			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

        endwhile;
    endif; ?>
	</div>

<?php if ( is_active_sidebar( 'new-widget-area' ) ) : ?>
    <section class="bg-gray-500 p-4 hidden">
        <div id="secondary-sidebar"
             class="new-widget-area grid grid-cols-3 gap-4 container mx-auto">
            <?php dynamic_sidebar( 'new-widget-area' ); ?>
        </div>
    </section>
<?php endif; ?>

<?php get_footer();
