<ul>
	<?php wp_list_pages('title_li='); ?>
</ul>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Body Right Sidebar') ) : ?>
            
            <?php if (function_exists('get_recent_comments')) { ?>
              <h3>Recent Comments</h3>
              <ul>
                <?php get_recent_comments(); ?>
              </ul>
            <?php } ?>

             <h3>search by tag</h3>
              <div id="tag_cloud">
                <?php wp_tag_cloud('smallest=9&largest=14&number=25'); ?>
              </div>
              <br/>
              <h3>search by category</h3>
              <ul id="cats">
                <?php wp_list_categories('hierarchical=false&title_li='); ?> 
              </ul>		    
<?php endif; ?>
