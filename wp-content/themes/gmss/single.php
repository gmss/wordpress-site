<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<article <?php post_class(); ?>>
		<header>
			<a href="<?php the_permalink(); ?>">
				<h1><?php the_title(); ?></h1>
			</a>
			<div class="meta">
				Originally posted on <?php the_time('j F Y'); ?>
			</div>
		</header>
		<?php the_content(); ?>
		<footer>
			This post has <?php comments_number('no comments', 'one comment', '% comments'); ?>.
			<?php comments_template(); ?>
		</footer>
	</article>

<?php endwhile; ?>


<?php get_footer(); ?>