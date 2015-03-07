<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<article <?php post_class(); ?>>
		<header>
			<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		</header>
		<?php the_content(); ?>
	</article>

<?php endwhile; ?>


<?php get_footer(); ?>