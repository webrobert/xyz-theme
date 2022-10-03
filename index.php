<?php get_header(); ?>

<div class="mx-auto xl:container">
<?php if ( have_posts() ) : ?>
    <header class="page-header alignwide px-4 sm:px-8">
        <h1 class="entry-title text-4xl md:text-5xl lg:text-7xl col-span-12 sm:col-span-10 md:col-span-7 pr-4">
            Blog</h1>
    </header>

    <div class="px-4 sm:px-8 my-8 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
		<?php while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/cards/format', in_category('twitter')
                ? 'twitter'
                : get_post_format()
        );

		endwhile; ?>
    </div>

    <?php echo get_template_part( 'pagination'); ?>

<?php endif; ?>
</div>

<?php get_footer();
