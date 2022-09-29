<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<section class="no-results not-found px-4 sm:px-8 my-8">
    <header class="page-header alignwide">
        <?php if ( is_search() ) : ?>

            <h1 class="page-title text-2xl md:text-3xl font-extrabold leading-tight mb-1">
                <?php
                printf(
                /* translators: %s: Search term. */
                    esc_html__( 'Results for "%s"', 'tailpress' ),
                    '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
                );
                ?>
            </h1>

        <?php else : ?>

            <h1 class="page-title text-2xl md:text-3xl font-extrabold leading-tight mb-1">
                <?php esc_html_e( 'Nothing here', 'tailpress' ); ?>
            </h1>

        <?php endif; ?>
    </header><!-- .page-header -->

    <div class="page-content default-max-width prose">

        <?php if ( is_search() ) : ?>

            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'tailpress' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'tailpress' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>
    </div><!-- .page-content -->
</section><!-- .no-results -->