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
			<span class="greater">Greater</span>
			<span class="manchester">Manchester</span>
			<span class="skeptics">Skeptics</span>
			<span class="society">Society</span>
		</h1></a><nav>
			<ul>
				<li><a href="http://www.facebook.com/GMSkeptics">Facebook</a></li>
				<li><a href="http://www.meetup.com/GMSkeptics">Meetup</a></li>
				<li><a href="http://www.twitter.com/GMSkeptics">Twitter</a></li>
				<li><a href="events">Events</a></li>
			</ul>
		</nav></header>
		<nav class="tabs"><ul>
			<li>
				<a href="/" class="active">Blog</a>
			</li><li>
				<a href="/events">Events</a>
			</li><li>
				<a href="#">Podcast</a>
			</li>
		</ul></nav>
		<div class="body">