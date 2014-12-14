<!DOCTYPE html>
<html>
	<head>
		<title><?php
			wp_title('|', true, 'right');
			bloginfo('name');
		?></title>
		<link rel="stylesheet" type="text/css"
		      href="<?php bloginfo('template_url'); ?>/gmss.css">
		<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/wheelguard/guard.js"></script>
		<meta name="theme-color" content="#000000">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/img/favicon.png"/>
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
				<li class="facebook long"><a href="http://www.facebook.com/GMSkeptics">Facebook Page</a><br>
					and <a href="https://www.facebook.com/groups/725096960872233">Group</a></li>
				<li class="meetup"><a href="http://www.meetup.com/GMSkeptics">Meetup</a></li>
				<li class="twitter"><a href="http://www.twitter.com/GMSkeptics">Twitter</a></li>
				<li class="google-plus"><a href="https://plus.google.com/114046965465550439802" rel="publisher">Google+</a></li>
			</ul>
		</nav></header>
		<nav class="tabs"><ul><?php
			$found = false;
			foreach (array(
							(object) array('url' => '/about', 'name' => 'About',
								'active' => preg_match('/^\/about($|\/)/i', $_SERVER['REQUEST_URI'])),
							(object) array('url' => '/upcoming-events', 'name' => 'Events',
								'active' => preg_match('/^\/(upcoming-)?events($|\/)/i', $_SERVER['REQUEST_URI'])),
							//(object) array('url' => '/podcast', 'name' => 'Podcast', 'active' => false),
							(object) array('url' => '/', 'name' => 'Blog', 'active' => true)
						) as $tab) {
				$active = $tab->active && !$found;
				$found = $found || $active;
				echo '<li><a href="' . $tab->url . '"' . ($active ? ' class="active"' : '') . '>' . $tab->name . '</a></li>';
			}
		?></ul></nav>
		<div class="body">
