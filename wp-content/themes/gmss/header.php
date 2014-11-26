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
			</ul>
		</nav></header>
		<nav class="tabs"><ul><?php
			$found = false;
			foreach (array(
							(object) array('url' => '/about', 'name' => 'About', 'active' => is_page(16)),
							(object) array('url' => '/events', 'name' => 'Events',
								'active' => preg_match('/^\/events($|\/)/i', $_SERVER['REQUEST_URI'])),
							(object) array('url' => '/podcast', 'name' => 'Podcast', 'active' => false),
							(object) array('url' => '/', 'name' => 'Blog', 'active' => true)
						) as $tab) {
				$active = $tab->active && !$found;
				$found = $found || $active;
				echo '<li><a href="' . $tab->url . '"' . ($active ? ' class="active"' : '') . '>' . $tab->name . '</a></li>';
			}
		?></ul></nav>
		<div class="body">