<?php

/* 	Template Name: Results Page Template */

$term     = esc_html( get_query_var('search'));
$my_query = new WP_Query([ 's' => $term ]);

if ( $my_query->have_posts() ) : ?>
    <h4 class="px-4 sm:px-8">
        <?php results_found_text($my_query->found_posts, $term); ?>
    </h4>

    <div class="px-4 sm:px-8 mt-2 mb-8 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php while ($my_query->have_posts() ) : $my_query->the_post();
            get_template_part( 'template-parts/cards/format', get_post_format() );
        endwhile; ?>
    </div>
<?php endif;