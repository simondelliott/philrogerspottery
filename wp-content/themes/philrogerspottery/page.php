<?php
get_header(); 
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="header">
	<h1><?php the_title(); ?></h1>
</div>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">

<div class="col1">
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>
</div>
<div class="col2">
    <?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>
