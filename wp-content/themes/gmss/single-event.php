<?php
/**
 * The template for displaying a single event
 *
 * Please note that since 1.7, this template is not used by default. You can edit the 'event details'
 * by using the event-meta-event-single.php template.
 *
 * Or you can edit the entire single event template by creating a single-event.php template
 * in your theme. You can use this template as a guide.
 *
 * For a list of available functions (outputting dates, venue details etc) see http://codex.wp-event-organiser.com/
 *
 ***************** NOTICE: *****************
 *  Do not make changes to this file. Any changes made to this file
 * will be overwritten if the plug-in is updated.
 *
 * To overwrite this template with your own, make a copy of it (with the same name)
 * in your theme directory. See http://docs.wp-event-organiser.com/theme-integration for more information
 *
 * WordPress will automatically prioritise the template in your theme directory.
 ***************** NOTICE: *****************
 *
 * @package Event Organiser (plug-in)
 * @since 1.0.0
 */

//Call the template header
get_header(); ?>

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
		<header class="full">
			<a href="<?php the_permalink(); ?>">
				<h1><?php the_title(); ?></h1>
			</a>
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
