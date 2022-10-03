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

get_header(); ?>

<div class="mx-auto xl:container">
<?php if ( have_posts() ) : ?>

    <header x-data="{ search: new URLSearchParams(location.search).get('s') }"
            x-init="$watch('search', value => updateResults(search))"
            class="page-header alignwide px-4 sm:px-8">
        <h1 class="page-title text-4xl md:text-7xl leading-tight mb-2">
            Search for: <span x-text="search" class="search-term"></span>
        </h1>

        <input x-model.debounce.500ms="search"
               autocomplete="off" type="search" id="search" class="py-1 px-2" placeholder="Search..." />
    </header>

    <div id="js-search-results">

        <h4 class="px-4 sm:px-8">
		    <?php results_found_text($wp_query->found_posts, esc_html( get_query_var('s'))) ?>
        </h4>

        <div class="px-4 sm:px-8 mt-2 mb-8 grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8">
	        <?php while ( have_posts() ) : the_post();

		        get_template_part( 'template-parts/cards/format', in_category('twitter')
			            ? 'twitter'
			            : get_post_format()
		        );

	        endwhile; ?>
        </div>

    </div>

<?php else : ?>

    <?php get_template_part( 'template-parts/content','none' ); ?>

<?php endif; ?>
</div>
<script>
    let search_term = '<?php echo get_search_query(); ?>';
    const url = new URL(window.location);

    function updateResults(search_term) {
        fetchResults(search_term)
        pushSearchTerm(search_term)
    }

    function pushSearchTerm(term) {
        url.searchParams.set('s', term);
        window.history.pushState({}, '', url);
    }

    function fetchResults(search) {
        fetch('/results?search=' + search)
            .then( response => response.text())
            .then( html => {
                document.querySelector('#js-search-results').innerHTML = html
            })
    }
</script>

<?php get_footer();
