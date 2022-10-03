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
