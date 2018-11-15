<?php
/**
 * Functions for comments.
 *
 * @package Drip
 * @since   1.0.0
 */

/**
 * Display comments.
 *
 * @param object $comment a object to comment.
 * @param array  $args    an array to comment settings.
 * @param int    $depth   an integer to comment depth.
 * @since        1.0.0
 */
function drip_the_comments( $comment, $args, $depth ) {
	?>
	<li id="li-comment-<?php comment_ID(); ?>" <?php comment_class( array( 'c-comments__block' ) ); ?>>
		<dl id="comment-<?php comment_ID(); ?>" class="c-comments__item">
		<dt class="c-comments__header">
			<div class="c-comments__author">
				<?php echo get_avatar( $comment, $size = '60' ); ?>
			</div>
		</dt>
		<dd class="c-comments__body">
			<?php if ( '0' === $comment->comment_approved ) : ?>
				<em><?php esc_html_e( 'Your comment is awaiting moderation.', 'drip' ); ?></em>
			<?php endif; ?>
			<div class="comment__meta vcard">
				<?php
					$drip_arrowed_html = array(
						'cite' => array(
							'class' => array(),
						),
					);
					printf(
						/* translators: %1$s: author link %2$s: comment date %3$s: comment time */
						wp_kses( __( '<cite class="fn">%1$s</cite> said on %2$s at %3$s', 'drip' ), $drip_arrowed_html ),
						get_comment_author_link(),
						esc_html( get_comment_date() ),
						esc_html( get_comment_time() )
					);
					edit_comment_link( 'edit', '  ', '' );
				?>
				</div>
				<?php comment_text(); ?>
				<?php
					$comment_reply_link = get_comment_reply_link(
						array_merge(
							$args,
							array(
								'reply_text' => '<i class="fas fa-reply"></i>',
								'depth'      => $depth,
								'max_depth'  => $args['max_depth'],
							)
						)
					);
				?>
		</dd>
		<dd class="c-comments__action">
			<?php if ( ! empty( $comment_reply_link ) ) : ?>
				<div class="c-comments__reply">
					<?php
						$drip_arrowed_html = array(
							'a' => array(
								'href'    => array(),
								'onclick' => array(),
								'target'  => array(),
							),
							'i' => array(
								'class' => array(),
							),
						);
					?>
					<?php echo wp_kses( $comment_reply_link, $drip_arrowed_html ); ?>
				</div>
			<?php endif; ?>
		</dd>
		</dl>

	<?php
}
