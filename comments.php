<div id="comments">
<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert"><?php _e('This post is password protected. Enter the password to view comments.', 'organicthemes'); ?></p>
	<?php
		return;
	}
?>	
<?php if ( have_comments() ) : ?>
	<h4><?php comments_number('No Comments','1 Comment','% Comments'); ?></h4>

	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'organicthemes'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div>

<div id="respond">
<?php if ('open' == $post->comment_status) : ?>

<h4><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h4>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('You must be', 'organicthemes'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'organicthemes'); ?></a> <?php _e('to post a comment', 'organicthemes'); ?>.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php _e('Logged in as', 'organicthemes'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', 'organicthemes'); ?> &raquo;</a></p>

<?php else : ?>

<div id="authorinput" class="commentinput"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><?php _e('Name', 'organicthemes'); ?> <?php if ($req) echo '<span class="req">*</span>'; ?></label></div>

<div id="emailinput" class="commentinput"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><?php _e('Email', 'organicthemes'); ?> <?php if ($req) echo '<span class="req">*</span>'; ?></label></div>

<div id="urlinput" class="commentinput"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
<label for="url"><?php _e('Website', 'organicthemes'); ?></label></div>

<?php endif; ?>

<textarea name="comment" id="comment" tabindex="4"></textarea>

<button type="submit" name="submit" id="submit" class="button" tabindex="5">Submit Comment</button>
<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // If comments open ?>
</div>