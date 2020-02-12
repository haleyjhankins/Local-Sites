<?php
 
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
 
if ( post_password_required() ) : ?>
	<p class="nocomment"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'Cosmopolitan' ); ?></p>
</div>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>
<!-- You can start editing here. -->
 
<?php if ( have_comments() ) : ?>
<!-- <h3 class="paddingleft" id="comments"> -->
	<?php //printf( _n( 'Comments (%1$s)', 'Comments (%1$s)', get_comments_number(), 'Cosmopolitan' ),number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );?>
<!--</h3>-->

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
	<div class="navigation">
		<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'Cosmopolitan' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'Cosmopolitan' ) ); ?></div>
	</div> <!-- .navigation -->
<?php endif; ?>
<div class="listcomments">
    <ol class="commentlist">
    	<?php wp_list_comments('callback=Cosmopolitan_comment'); ?>
    </ol>
</div> 
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'Cosmopolitan' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'Cosmopolitan' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>
<?php else : // this is displayed if there are no comments so far ?>
 
<?php if ('open' == $post->comment_status) : ?>
<!-- If comments are open, but there are no comments. -->
 
<?php else : // comments are closed ?>
<!-- If comments are closed. -->
<p class="nocomments"><?php _e( 'Comments are closed.', 'Cosmopolitan' ); ?></p>
 
<?php endif; ?>
<?php endif; ?>
 
<?php if ('open' == $post->comment_status) : ?>
	<div class="paddingleft top30">
		<h3 class="uppercase"><?php comment_form_title( 'Leave a comment', 'Leave a Reply to %s' ); ?></h3> 
	</div>
 
	<div class="contentboxform marginleft">
		<p class="bottom20"><?php _e('Your email address will not be shared or published. Required fields are marked *', 'Cosmopolitan');?></p>
		<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> 
			to post a comment.</p>
		<?php else : ?>
		  
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentsubmit" class="clearfix">     
				<?php if ( $user_ID ) : ?>
					<p>
						<?php _e('Logged in as', 'Cosmopolitan')?> 
						<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
						<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', 'Cosmopolitan')?> &raquo;</a>
					</p>
				<?php else : ?>
					<div class="grid_6 alpha">
						<input type="text" name="author" id="author" title="Name" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					</div>
					<div class="grid_6 alpha">
						<input type="text" name="email" title="Email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					</div>
				<?php endif; ?>
				 
				<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
				 
				<div class="grid_6 omega">
					<textarea name="comment" title="Comment" id="comment" cols="100" rows="10" tabindex="4"></textarea>
				</div>
				 
				<div class="grid_6 omega clearfix">
					<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Post Comment', 'Cosmopolitan')?>" class="button highlight small"  />
					<?php comment_id_fields(); ?>
				</div>
				<?php do_action('comment_form', $post->ID); ?>
			 
			</form>
	 
		<?php endif; // If registration required and not logged in ?>
	</div>
<?php endif;  ?>
</div>
