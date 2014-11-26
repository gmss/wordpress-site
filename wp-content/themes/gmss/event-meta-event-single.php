<div class="entry-meta eventorganiser-event-meta">

	<?php $date_format = eo_is_all_day() ? 'j F Y' : ('j F Y ' . get_option('time_format')); ?>

	<?php
		if( eo_reoccurs() ) {
			$next = eo_get_next_occurrence($date_format);
			if(!$next)
				printf('<p>'.__('This event finished on %s','eventorganiser').'.</p>', eo_get_schedule_last('d F Y',''));
		}
	?>

	<ul class="eo-event-meta">

		<?php if( !eo_reoccurs() ){ ?>
			<li><strong><?php _e('Start', 'eventorganiser') ;?>:</strong> <?php eo_the_start($date_format); ?> </li>
			<?php
		 } ?>

		<?php if( eo_get_venue() ){ 
			$tax = get_taxonomy( 'event-venue' ); ?>
			<li><strong><?php echo esc_html( $tax->labels->singular_name ) ?>:</strong> <a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></li>
		<?php } ?>

		<?php if( get_the_terms(get_the_ID(),'event-category') ){ ?>
			<li><strong><?php _e('Type','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></li>
		<?php } ?>
	
		<?php if( get_the_terms(get_the_ID(),'event-tag') && !is_wp_error( get_the_terms(get_the_ID(),'event-tag') ) ){ ?>
			<li><strong><?php _e('Tags','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-tag', '', ', ', '' ); ?></li>
		<?php } ?>

		<?php if( eo_reoccurs() ){ 			
			//Event reoccurs - display dates. 
			$upcoming = new WP_Query(array(
				'post_type'=>'event',
				'event_start_after' => 'today',
				'posts_per_page' => -1,
				'event_series' => get_the_ID(),
				'group_events_by'=>'occurrence'//Don't group by series
			));

			if( $upcoming->have_posts() ): ?>

				<li><strong><?php _e('Upcoming Dates','eventorganiser'); ?>:</strong>
					<ul id="eo-upcoming-dates">
						<?php while( $upcoming->have_posts() ): $upcoming->the_post(); ?>
								<li> <?php eo_the_start($date_format) ?></li>
						<?php endwhile; ?>
					</ul>
				</li>

				<?php 
				wp_reset_postdata(); 
				//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
				wp_enqueue_script('eo_front');
				?>
			<?php endif; ?>
		<?php } ?>

	</ul>

	<!-- Does the event have a venue? -->
	<?php if( eo_get_venue() ): ?>
		<!-- Display map -->
		<div class="eo-event-venue-map">
			<?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
		</div>
	<?php endif; ?>

</div>