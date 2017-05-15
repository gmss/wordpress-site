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
		<?php if (!in_category(37)): ?>
			<footer>
				<a href="<?php the_permalink(); ?>">This post</a> has <?php comments_number('no comments', 'one comment', '% comments'); ?>.
			</footer>
		<?php endif ?>
	</article>

<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below">
		<div class="nav-next nav-later"><?php next_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>' , 'eventorganiser' ) ); ?></div>
		<div class="nav-previous nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&larr;</span> Previous', 'eventorganiser' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>


<?php get_footer(); ?>