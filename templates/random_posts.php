<?php
$post_args = [
	'posts_per_page' => 3,
	'orderby' => 'rand',
	'post_status' => 'publish',
	'post_type' => 'post',
];
$query = new WP_Query($post_args);

if ($query->have_posts()) {
?>

	<div id='random-posts'>
		<?php while ($query->have_posts()) : $query->the_post(); ?>

			<div style='border:2px groove black; margin-bottom:5px;'>
				<h3> <?php the_title(); ?> </h3>
				<p> <?php the_excerpt(); ?>
			</div>

		<?php endwhile; ?>

		<button hx-post="/htmx/random_posts" hx-target="#random-posts">
			More
		</button>
	</div>

<?php

	wp_reset_postdata();
}
