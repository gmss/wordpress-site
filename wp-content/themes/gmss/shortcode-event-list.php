<?php

include 'event-setup.php';

if( $eo_event_loop->have_posts() ): ?>

	<?php while( $eo_event_loop->have_posts() ):
			$eo_event_loop->the_post(); 
			$eo_event_classes = eo_get_event_classes();
			$format = (eo_is_all_day() ? $date_format : $date_format.' '.$time_format);
		?>

		<article class="<?php echo esc_attr(implode(' ',$eo_event_classes)); ?>">
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

<?php elseif( ! empty($eo_event_loop_args['no_events']) ): ?>

	<ul id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr($classes);?>" > 
		<li class="eo-no-events" > <?php echo $eo_event_loop_args['no_events']; ?> </li>
	</ul>

<?php endif; ?>

