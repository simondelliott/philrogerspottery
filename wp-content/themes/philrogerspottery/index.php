<?php
	get_header();
?>
<div class="colmask threecol">
	<div class="colmid">
		<div class="colleft">
			<div class="col1">
			    <?php if (have_posts()) : ?>
			      <?php while (have_posts()) : the_post(); ?>
			      <div class="item">
			                <div class="side left">
			                  <span class="date"><?php the_time('j M Y, g:ia') ?></span><br/>
			                  <span class="labels"><?php the_category(' ') ?><?php the_tags(': ', ' '); ?></span><br/>
			                  by <?php the_author() ?><br/>
			                  <?php comments_popup_link('leave a comment', '1 comment', '% comments'); ?>
			                  <?php edit_post_link('edit', '', ''); ?><br/>
			                  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post Left Sidebar') ) : ?>
			                  <?php endif; ?>
			                </div>
			                <div class="main">
			                  <h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			                  <?php the_content('more &raquo;'); ?>
			                </div>
			              </div>
			      <?php endwhile; ?>
			      <?php comments_template(); ?>
			            <div class="item">
			              <div class="side left">
			                &nbsp;
			              </div>
			              <div class="main">
			                <?php previous_post_link('&larr; %link') ?>&nbsp;&nbsp;<?php next_post_link('%link &rarr;') ?>
			              </div>
			            </div>
			            <div class="item">
			              <div class="side left">
			                &nbsp;
			              </div>
			              <div class="main">
			                <?php posts_nav_link('&nbsp;&nbsp;', __('&larr; Previous Page'), __('Next Page &rarr;')); ?>
			              </div>
			            </div>
			          <?php else : ?>
			            <div class="item">
			              <div class="side left">
			                &nbsp;
			              </div>
			              <div class="main">
			                <h2>Posts Not Found</h2>
			                <p>Sorry, no posts matched your criteria.</p>
			              </div>
			            </div>
			    <?php endif; ?>
			</div>
			<div class="col2">
	    		<?php get_sidebar(); ?>
			</div>
			<div class="col3">
				<img id="logo" src="<?php bloginfo('template_directory'); ?>/logo_full.gif"/>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
      
      