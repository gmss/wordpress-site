<?php get_header(); ?>

<header class="page">
	<?php
		$header = false;
		if( eo_is_event_archive('day') )
			//Viewing date archive
			$header = __('Events: ','eventorganiser').' '.eo_get_event_archive_date('jS F Y');
		elseif( eo_is_event_archive('month') )
			//Viewing month archive
			$header = __('Events: ','eventorganiser').' '.eo_get_event_archive_date('F Y');
		elseif( eo_is_event_archive('year') )
			//Viewing year archive
			$header = __('Events: ','eventorganiser').' '.eo_get_event_archive_date('Y');
		if ($header)
			echo '<h1>' . $header . '</h1>';
		else echo '<p>This page includes events run outside of Manchester Skeptics which may be of interest to our members. <a href="/events/category/gmss">To show only Skeptics events click here</a> and <a href="/events/category/ext">to see only other events, click here</a>.</p>';
	?>
</header>

<?php while (have_posts()) :
	the_post();
	if (eo_is_all_day()) {
		$format = 'd F Y';
		$microformat = 'Y-m-d';
	} else {
		$format = 'd F Y '.get_option('time_format');
		$microformat = 'c';
	} ?>

	<article <?php post_class(); ?>>
		<header class="compact">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="date">
				<time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>">
					<?php eo_the_start($format); ?>
				</time>
				<?php echo eo_get_event_meta_list(); ?>
			</div>
		</header>
		<?php the_excerpt(); ?>
	</article>

<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below">
		<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
		<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>

<?php get_footer(); ?>
