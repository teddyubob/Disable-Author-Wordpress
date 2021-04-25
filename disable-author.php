<?php
/*
Plugin Name: Disable Author
Description: Disable Author and redirect to 404 page
Wordpress Version: 5.7.1
Version: 0.1
Author: Teddy
*/
add_action( 'template_redirect',
	function() {
		if ( isset( $_GET['author'] ) || is_author() ) {
			global $wp_query;
			$wp_query->set_404();
			status_header( 404 );
			nocache_headers();
		}
	}, 1 );
add_filter( 'author_link', function() { return '#'; }, 99 );
add_filter( 'the_author_posts_link', '__return_empty_string', 99 );
