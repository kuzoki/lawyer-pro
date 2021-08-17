
<?php
function lawyer_comment_template($comment, $args, $depth) {
	
	?>

	<div class="post-comment-group" id="comment-<?php comment_ID(); ?> <?php comment_class( $comment->has_children ? 'parent' : '' ); ?>">
		<h3 class="in-title">Latest Comment (<?php echo get_comments_number()?>)</h3>				
		<div class='block-comment'>
			
			<figure class="comment-avatar">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</figure>
			<div class="post-comment-text">
				<p class="person-name title"><?php printf( get_comment_author() ) ; ?></p>
				<p class="date"><?php printf(get_comment_time('M j , Y') );?></p>
				<div class="body-text">
					<?php comment_text(); ?>
				</div>
				<?php
					comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<span class="reply-text">',
					'after'     => '</span>'
					) ) );
				?>
								
			</div>
		</div>

	<?php
}