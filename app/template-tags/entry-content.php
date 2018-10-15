<?php
/**
 * The template for displaying entry content of each pages.
 *
 * @package  drip
 * @since    drip 1.0.0
 */

?>

<div class="c-entry">
	<main>
		<article <?php post_class( 'c-entry__items' ); ?>>
			<?php get_template_part( 'app/template-tags/entry-header' ); ?>
			<div class="c-entry__content">
				<?php the_content(); ?>
			</div>
			<div class="c-entry__footer">
				<footer>
					<div class="c-tags"><?php the_tags(); ?></div>
					<div class="c-aside-box c-profile-box">
						<aside>
							<h2 class="c-aside-box__title"><?php esc_html_e( 'Author', 'drip' ); ?></h2>
							<div class="c-profile-box__container">
								<div class="c-profile-box__figure">
									<?php echo get_avatar( $author ); ?>
								</div>
								<div class="c-profile-box__body">
									<p class="c-profile-box__author">
										<?php the_author(); ?>
									</p>
									<div class="c-profile-box__description">
										<?php echo esc_html( get_the_author_meta( 'description' ) ); ?>
									</div>
								</div>
							</div>
						</aside>
					</div>
				</footer>
			</div>
		</article>
	</main>
</div>
<?php
if ( comments_open() || pings_open() || get_comments_number() ) {
	comments_template( '', true );
}
?>
