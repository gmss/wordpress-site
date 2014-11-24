<!DOCTYPE html>
<html>
	<head>
		<title><?php
			wp_title('|', true, 'right');
			bloginfo('name');
		?></title>
		<link rel="stylesheet" type="text/css"
		      href="<?php bloginfo('template_url'); ?>/gmss.css">
		<?php wp_head(); ?>
	</head>
	<body>
		<header class="site"><a href="/" class="logo"><h1>
				Greater Manchester Skeptics Society
		</h1></a><nav>
			<ul>
				<li><a href="http://www.facebook.com/GMSkeptics">Facebook</a></li>
				<li><a href="http://www.meetup.com/GMSkeptics">Meetup</a></li>
				<li><a href="http://www.twitter.com/GMSkeptics">Twitter</a></li>
				<li><a href="events">Events</a></li>
			</ul>
		</nav></header>
		<div class="body">