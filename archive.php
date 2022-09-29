<?php
get_header();
$description = get_the_archive_description();
?>

<div class="mx-auto xl:container">
<?php if ( have_posts() ) : ?>

    <header class="page-header alignwide px-4 sm:px-8">
	    <?php the_archive_title( '<h1 class="page-title text-4xl md:text-7xl leading-tight mb-2">', '</h1>' ); ?>
    </header>

    <div class="px-4 sm:px-8 my-8 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/cards/format', get_post_format() ); ?>

        <?php endwhile; ?>
    </div>

    <?php echo get_template_part( 'pagination'); ?>

<?php endif; ?>
</div>

<?php get_footer();