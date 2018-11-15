<?php
/**
 * The template for displaying site branding of each pages.
 *
 * @package  drip
 * @since    drip 1.0.0
 */

?>

<div class="c-site-branding">
	<p class="c-site-branding__title">
		<?php if ( has_custom_logo() ) : ?>
			<?php the_custom_logo(); ?>
		<?php else : ?>
		<a href="<?php echo esc_url( home_url() ); ?>">
			<?php bloginfo( 'name' ); ?>
		</a>
		<?php endif; ?>
	</p>
</div>
