<?php get_header(); ?>

<!-- Page header, display category title-->
<header class="page-header">
	<?php
		$category_id = category_id();
		if (($category_id == 30) || ($category_id == 38)): ?>
			<h1 class="page-title"><?php
				printf( __( 'Event Category Archives: %s', 'eventorganiser' ), '<span>' . single_cat_title( '', false ) . '</span>' );
			?></h1>
	<?php endif; ?>

	<!-- If the category has a description display it-->
	<?php
		$category_description = category_description();
		if ( ! empty( $category_description ) )
			echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
	?>
</header>

<?php 
include 'event-setup.php';
if (have_posts()): ?>

	<!-- Navigate between pages-->
	<!-- In TwentyEleven theme this is done by twentyeleven_content_nav-->
	<?php 
	global $wp_query;
	if ( $wp_query->max_num_pages > 1 ): ?>
		<nav id="nav-above">
			<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
			<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif; ?>


	<?php while (have_posts()) : 
			the_post();
			$eo_event_classes = eo_get_event_classes(); 
			$format = (eo_is_all_day() ? $date_format : $date_format.' '.$time_format);
		?>

		<article class="<?php echo esc_attr(implode(' ',$eo_event_classes)) . ' ' . post_class(); ?>">
			<header class="compact">
				<h1><a href="<?php the_permalink(); ?>"><?php
					if (has_post_thumbnail())
						the_post_thumbnail('thumbnail');
					the_title();
				?></a></h1>
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

	<!-- Navigate between pages-->
	<?php 
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="nav-below">
			<div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
			<div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Newer events', 'eventorganiser' ) ); ?></div>
		</nav><!-- #nav-below -->
	<?php endif; ?>

<?php elseif( ! empty($eo_event_loop_args['no_events']) ): ?>

	<ul id="<?php echo esc_attr($id);?>" class="<?php echo esc_attr($classes);?>" > 
		<li class="eo-no-events" > <?php echo $eo_event_loop_args['no_events']; ?> </li>
	</ul>

<?php endif; ?>

<?php get_footer(); ?>
