<?php
/**
 * The Comment template.
 *
 * @package   Drip
 * @copyright Copyright (c) 2018 Glatch
 * @license   GNU General Public License v2.0
 * @since     drip 1.0
 */

?>
<div id="comments" class="c-comments">
	<?php if ( ! empty( $comments_by_type['comment'] ) || comments_open() ) : ?>
		<h2 class="c-comments__title"><?php esc_html_e( 'Comments on this post', 'drip' ); ?></h2>
		<?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>
			<ol class="c-comments__list">
				<?php
				wp_list_comments(
					array(
						'type'     => 'comment',
						'callback' => 'drip_the_comments',
					)
				);
				?>
			</ol>
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<div class="c-comments__pager">
					<p>
						<?php
						paginate_comments_links(
							array(
								'prev_text' => '&laquo;',
								'next_text' => '&raquo;',
							)
						);
						?>
					</p>
				</div>
		<?php endif; ?>
		<?php else : ?>
			<p class="comments__nocomments"><?php esc_html_e( 'No comments.', 'drip' ); ?></p>
		<?php endif; ?>

		<?php if ( comments_open() ) : ?>
			<div class="c-comments__respond">
				<?php if ( get_option( 'comment_registration' ) && ! $user_ID ) : ?>
					<p>
						<?php
						printf(
							/* translators: %s: home url */
							esc_html__( 'It is necessary to <a href="%/wp-login.php?redirect_to=%s">login</a> to write comment.', 'drip' ),
							esc_html( home_url() ),
							esc_html( get_permalink() )
						);
						?>
					</p>
				<?php else : ?>
					<div class="c-comments__form">
						<?php	comment_form(); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
