<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}
?>

          <?php if ('open' == $post->comment_status) : ?>
            <?php if ($comments) : ?>
              <div class="item" id="comments"></div>
              <?php foreach ($comments as $comment) : ?>
                <div class="item" id="comment-<?php comment_ID() ?>">
                  <div class="comment_author">
                    <?php echo get_avatar( $comment, $size = '48', $default = 'identicon' ); ?><br/>
                    <span><?php comment_date('j M Y') ?></span><br/>
                    by <?php comment_author_link() ?><br/>
                    <?php edit_comment_link('edit', '', ''); ?><br/>
                  </div>
                  <div class="comment_body">
                    <div class="comment">
                      <?php comment_text() ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            <div class="item">
              <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="respond">
                <div class="side left">
                  <?php if ( $user_ID ) : ?>
                    logged in as<br/>
                    <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a><br/>
                    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">log out</a><br/>
                  <?php else : ?>
                    *name<br/>
                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="17" tabindex="1" /><br/>
                    *e-mail<br/>
                    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="17" tabindex="2" /><br/>
                    web site<br/>
                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="17" tabindex="3" /><br/>
                  <?php endif; ?>
                </div>
                <div class="main">
                  leave a comment<br/>
                  <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea><br/>
                  <input name="submit" type="submit" id="submit" tabindex="5" value="Submit" /><br/>
                  <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                  <?php do_action('comment_form', $post->ID); ?>
                </div>
              </form>
            </div>
          <?php endif; ?>