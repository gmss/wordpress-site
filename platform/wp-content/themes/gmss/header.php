<!DOCTYPE html>
<html>
	<head>
		<title><?php
			wp_title('|', true, 'right');
			bloginfo('name');
		?></title>
		<meta name="theme-color" content="#000000">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<link rel="icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/img/logo-crop.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="Skepticism,skeptics,Scepticism,sceptics,Science,Greater Manchester,Greater,Manchester,Stockport,Lancashire,Wigan,Bolton,Oldham,Chorley,Trafford,Salford,Alternative Medicine,Complementary Medicine,Medicine,UFO,Ghost,Quantum Touch,Energy Healing,Crystals,Urban Myths,Homeopathy,1023,Ten23,QED,humanism" />
		<?php wp_head(); ?>
	</head>
	<body>
		<header itemscope class="site" itemtype="http://schema.org/Organization"><a href="/" class="logo"><h1 itemprop="name">
			<span class="greater">Greater</span>
			<span class="manchester">Manchester</span>
			<span class="skeptics">Skeptics</span>
			<span class="society">Society</span>
		</h1></a><nav>
			<ul>
				<li class="facebook long"><a href="http://www.facebook.com/GMSkeptics">Facebook Page</a><br>
					and <a href="https://www.facebook.com/groups/725096960872233">Group</a></li>
				<?php // <li class="meetup"><a href="http://www.meetup.com/GMSkeptics-Meetup">Meetup</a></li> ?>
				<li class="twitter"><a href="http://www.twitter.com/GMSkeptics">Twitter</a></li>
				<li class="google-plus"><a href="https://plus.google.com/114046965465550439802" rel="publisher">Google+</a></li>
				<?php if (is_user_logged_in()) { ?>
					<li class="settings"><a href="/platform/wp-admin/profile.php">Settings</a></li>
				<?php } else { ?>
					<li class="join"><a href="/platform/wp-login.php?action=register">Join</a></li>
				<?php } ?>
			</ul>
		</nav><div class="hidden">
			<span itemprop="logo">http://www.gmss.uk/wp-content/themes/gmss/img/full-size/full-logo.jpg</span>
			<span itemprop="url">http://www.gmss.uk</span>
			<span itemprop="email">web@gmss.uk</span>
			<div itemprop="brand">
				<span itemprop="name">Manchester Skeptics in the Pub</span>
				<span itemprop="description">
					A monthly speaker event and a monthly pub social.
				</span>
			</div>
			<span itemprop="description">
				A friendly group of skeptical thinkers organising events in the Manchester area.
			</span>
		</div></header>

		<?php function makeTabs($tabs) {
			$found = false;
			foreach ($tabs as $tab) {
				$active = $tab->active && !$found;
				$found = $found || $active;
				echo '<li><a href="' . $tab->url . '"' . ($active ? ' class="active"' : '') . '>' .
					$tab->name . '</a></li>';
			}
		} ?>

		<nav class="tabs"><ul>
			<?php 
				$staticHome = (get_option('show_on_front') == 'page');
				makeTabs(array(
					(object) array(
						'url' => '/about',
						'name' => 'About',
						'active' => preg_match('/^\/about($|\/)/i', $_SERVER['REQUEST_URI'])),
					(object) array(
						'url' => '/upcoming-events',
						'name' => 'Events',
						'active' => preg_match('/^\/((upcoming|other)-)?events($|\/)/i', $_SERVER['REQUEST_URI'])),
					//(object) array('url' => '/podcast', 'name' => 'Podcast', 'active' => false),
					(object) array(
						'url' => $staticHome
							? get_permalink(get_option('page_for_posts'))
							: '/',
						'name' => 'Blog',
						'active' => (!$staticHome) or
							(preg_match('/^\/(blog|posts)($|\/)/i', $_SERVER['REQUEST_URI'])))
			)); ?>
			<li class="non-tab search-box"><form method="GET" action="/"><input type="text" name="s"></form></li>
		</ul></nav>

		<?php if (preg_match('/^\/([a-z]+-)?events($|\/)/i', $_SERVER['REQUEST_URI']) ||
				  isset($isEvent)) { ?><nav class="subtabs"><ul>
			<?php makeTabs(array(
				(object) array('url' => '/upcoming-events', 'name' => 'Upcoming',
					'active' => preg_match('/^\/upcoming-events($|\/)/i', $_SERVER['REQUEST_URI'])),
				(object) array('url' => '/other-events', 'name' => 'Other',
					'active' => preg_match('/^\/other-events($|\/)/i', $_SERVER['REQUEST_URI'])),
				(object) array('url' => '/events/category/gmss', 'name' => 'All', 
					'active' => preg_match('/^\/events(\/(page\/[0-9]+\/?)?)?$/i', $_SERVER['REQUEST_URI'])),
			)); ?>
			<li class="non-tab"><a href="webcal://www.gmss.uk/feed/eo-events/" title="Subscribe to our events as an iCal feed">iCal</a></li>
			<li class="non-tab"><a href="http://www.google.com/calendar/render?cid=http%3A%2F%2Fwww.gmss.uk%2Ffeed%2Feo-events%2F" title="Subscribe to our events feed in Google Calendar">Google</a></li>
		</ul></nav></header><?php } ?>

		<div class="body">
