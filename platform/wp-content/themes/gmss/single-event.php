<?php $isEvent = true; get_header(); ?>

<?php while (have_posts()) :
	the_post();
	if (eo_is_all_day()) {
		$format = 'l, d F Y';
		$microformat = 'Y-m-d';
	} else {
		$format = 'l, d F Y '.get_option('time_format');
		$microformat = 'c';
	} ?>

	<article <?php post_class(); ?>>
		<header class="full">
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				<?php eo_get_template_part('event-meta','event-single'); ?>
			</div>
		</header>
		<?php the_content(); ?>
		<footer>
			<?php comments_template(); ?>
		</footer>
	</article>

<?php endwhile; ?>

<?php get_footer(); ?>
