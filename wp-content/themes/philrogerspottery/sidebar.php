          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Body Right Sidebar') ) : ?>
            <h3>Recent Pieces</h3>
            <ul>
              <?php wp_get_archives('type=postbypost&limit=10'); ?> 
            </ul>
            <?php if (function_exists('get_recent_comments')) { ?>
              <h3>Recent Comments</h3>
              <ul>
                <?php get_recent_comments(); ?>
              </ul>
            <?php } ?>

        <h3>Linkroll</h3>
    <ul>
  <?php get_links(-1, '<li>', '</li>', ' - '); ?>
    </ul>

             <h3>Tags</h3>
              <div>
                <?php wp_tag_cloud('smallest=9&largest=14&number=25'); ?>
              </div>
              <br/>
              <h3>Categories</h3>
              <ul>
                <?php wp_list_categories('hierarchical=false&title_li='); ?> 
              </ul>		    
            <h3>Community</h3>
              <ul>
			<?php wp_loginout(); ?> 
<?php wp_register(); ?>		  
              </ul>
<?php endif; ?>
