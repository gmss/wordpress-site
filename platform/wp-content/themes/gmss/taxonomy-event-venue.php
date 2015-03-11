<?php get_header(); ?>

	<header class="page">	
		
		<?php $venue_id = get_queried_object_id(); ?>
		
		<h1 class="page-title"><?php printf( __( 'Events at: %s', 'eventorganiser' ), '<span>' .eo_get_venue_name($venue_id). '</span>' );?></h1>

		<?php if( $venue_description = eo_get_venue_description( $venue_id ) ){
			 echo '<div class="venue-archive-meta">'.$venue_description.'</div>';
		} ?>
		
		<div class="kickstand venue-map">
			<?php echo eo_get_venue_map( $venue_id ); ?>
		</div>
	</header>

	<?php if ( have_posts() ) : ?>

		<?php 
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-above">
					<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
					<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
				</nav>
		<?php endif; ?>

		<?php while ( have_posts()) : the_post(); ?>
	
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">

				<h1><a href="<?php the_permalink(); ?>"><?php
					//If it has one, display the thumbnail
					if (has_post_thumbnail())
						the_post_thumbnail('thumbnail');

					//Display the title
					the_title();
				?></a></h1>
		
				<div class="event-entry-meta">

					<?php
					//Format date/time according to whether its an all day event.
					//Use microdata https://support.google.com/webmasters/bin/answer.py?hl=en&answer=176035
 					if( eo_is_all_day() ){
						$format = 'd F Y';
						$microformat = 'Y-m-d';
					}else{
						$format = 'd F Y '.get_option('time_format');
						$microformat = 'c';
					}?>
					<time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>"><?php eo_the_start($format); ?></time>

					<?php echo eo_get_event_meta_list(); ?>

					<?php the_excerpt(); ?>
			
				</div>
		
				<div style="clear:both;"></div>
			</header>
			</article>

    		<?php endwhile; ?>

			<?php 
			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="nav-below">
					<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
					<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
				</nav>
			<?php endif; ?>


	<?php else : ?>
			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'eventorganiser' ); ?></h1>
				</header>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but no events were found for the requested venue. ', 'eventorganiser' ); ?></p>
				</div>
			</article>
	<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>
