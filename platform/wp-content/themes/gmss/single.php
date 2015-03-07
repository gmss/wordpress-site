<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<article <?php post_class(); ?>>
		<header>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="meta">
				Originally posted on <?php the_time('j F Y'); ?>
			</div>
		</header>
		<?php the_content(); ?>
		<footer>
			<?php comments_template(); ?>
		</footer>
	</article>

<?php endwhile; ?>


<?php get_footer(); ?>