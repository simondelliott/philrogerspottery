<?php
/**
 * Template Name: home page
 *
 * A custom page template without sidebar.
 *
 */

get_header(); 
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="header" class="home_page">
	<h1>&nbsp;<!-- <?php the_title(); ?>--></h1>
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
</div>
<div class="col2">
	<ul>
	<?php wp_list_pages('title_li='); ?>
	</ul>
</div>


<?php get_footer(); ?>
