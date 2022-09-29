<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

?>

<div class="mx-auto xl:container">
<?php if ( have_posts() ) : ?>

    <header class="page-header alignwide px-4 sm:px-8">
        <h1 class="page-title text-4xl md:text-7xl leading-tight mb-2">
        <?php $plural = _n( 'result', 'results', (int) $wp_query->found_posts, 'tailpress' );

        printf( '%d '. $plural .' for %s', (int) $wp_query->found_posts,
                '<span class="search-term">' . esc_html( get_search_query() ) . '</span>' ); ?>
        </h1>
    </header><!-- .page-header -->

    <div class="px-4 sm:px-8 my-8 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/cards/format', get_post_format() );

            endwhile; ?>
    </div>

    <?php get_template_part( 'pagination'); ?>

<?php else : ?>

    <?php get_template_part( 'template-parts/content','none' ); ?>

<?php endif; ?>
</div>

<?php get_footer();
