<?php

// From https://wordpress.org/support/topic/plugin-event-organiser-archive-page-change-order-to-descending#post-3091586
// Fixes order of events on all events page to show recent first.
add_action('pre_get_posts','wpse50761_alter_query',5);
function wpse50761_alter_query($query) {
	if ($query->is_main_query() &&
			(is_post_type_archive('event') ||
			preg_match('/^\/events($|\/)/i', $_SERVER['REQUEST_URI']))) {
		$query->set('orderby', 'eventstart');
		$query->set('order', 'desc');
	}
}

remove_action('wp_head', 'feed_links_extra', 3);
add_action('wp_head', 'feed_links_if', 1);
function feed_links_if($a) {
	if (get_the_ID() == 468 || is_home())
		echo '<link rel="alternate" type="application/rss+xml" title="Greater Manchester Skeptics Society" href="/feed/">';
	else feed_links_extra($a);
}