<?php
get_header();
$description = get_the_archive_description();

$my_query = new WP_Query([
	'post_type' => 'post',
    'posts_per_page' => -1
]);
?>

<div class="my-8 mt-4 sm:mt-8 mx-auto relative">

    <header class="entry-header mb-4 px-5 md:px-8 space-y-8 mb-12">
        <h1 class="entry-title text-4xl md:text-7xl leading-tight mb-2">
            <?php the_title(); ?>
        </h1>
    </header>

    <hr class="hidden sm:block border-b-1 border-white my-12"/>

    <?php if ( $my_query->have_posts() ) : ?>
    <div class="entry-content px-5 md:text-lg xl:text-xl max-w-3xl mx-auto">
    <?php while ($my_query->have_posts() ) : $my_query->the_post();
        $addClosing = false;
        $postYear = get_the_date('Y');
        $postMonth = get_the_date('F');

        if (!isset($year) || $year != $postYear) : ?>
        <h1 class="text-6xl mt-8"><?php echo $postYear ?></h1>
        <?php endif;

        if (!isset($month) || $month != $postMonth) : ?>
        <h2 class="text-xl mt-6 mb-2"><?php echo $postMonth ?></h2>
        <?php endif; ?>

        <h3 class="ml-2">
            <span class="w-6 inline-block"><?php echo get_the_date('d') ?></span>
            <a href="<?php the_permalink(); ?>" class="text-blue-500"><?php the_title() ?></a>
        </h3>

        <?php
        $year = $postYear;
        $month = $postMonth;
        endwhile;
    endif; ?>
    </div>
</div>

<?php get_footer();