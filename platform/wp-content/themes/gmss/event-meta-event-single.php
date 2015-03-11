<div class="entry-meta eventorganiser-event-meta">

	<?php $date_format = eo_is_all_day() ? 'j F Y' : ('j F Y ' . get_option('time_format'));
		$microformat = 'Y-m-d'; ?>

	<?php
		if( eo_reoccurs() ) {
			$next = eo_get_next_occurrence($date_format);
			if(!$next) {
				printf('<p>'.__('This event finished on %s','eventorganiser').'.</p>', eo_get_schedule_last('d F Y',''));
			}
		}
	?>

	<div class="eo-event-meta">
		<time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>">
			<?php eo_the_start($date_format); ?>
		</time>
		<p><?php
			echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?> event
			at <a href="<?php eo_venue_link(); ?>"><?php eo_venue_name();
		?></a></p>

		<?php if( get_the_terms(get_the_ID(),'event-tag') && !is_wp_error( get_the_terms(get_the_ID(),'event-tag') )) { ?>
			<strong><?php _e('Tags','eventorganiser'); ?>:</strong>
			<?php echo get_the_term_list( get_the_ID(),'event-tag', '', ', ', '' );
		}

		if( eo_reoccurs() ){

			//Event reoccurs - display dates. 
			$upcoming = new WP_Query(array(
				'post_type'=>'event',
				'event_start_after' => 'today',
				'posts_per_page' => -1,
				'event_series' => get_the_ID(),
				'group_events_by'=>'occurrence'//Don't group by series
			));

			if( $upcoming->have_posts() ){ ?>

				<div><strong><?php _e('Upcoming Dates','eventorganiser'); ?>:</strong>
					<ul id="eo-upcoming-dates">
						<?php while( $upcoming->have_posts() ): $upcoming->the_post(); ?>
								<li> <?php eo_the_start($date_format) ?></li>
						<?php endwhile; ?>
					</ul>
				</div>

				<?php 
				wp_reset_postdata(); 
				//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
				wp_enqueue_script('eo_front');
				?>
			<?php }
		} ?>
	</div>


	<?php if( eo_get_venue() ): ?>
		<div class="eo-event-venue-map kickstand">
			<?php echo eo_get_venue_map(eo_get_venue()); ?>
		</div>
	<?php endif; ?>

</div>