<?php

// Initialise Wordress
require('../../../wp-blog-header.php');

$id = $_GET['uid'];
$key = $_GET['key'];

if ($key != get_the_author_meta('unsubscribe_key', $uid))
	wp_die('Please login and unsubscribe manually.', 'Could not unsubscribe you.');

update_user_meta($uid, 'gmss_newsletter', 'false');

wp_die('You should not receive any more emails from us (unless by some coincidence we sent one while you were doing this). ',
       'Unsubscribed!');