<?php
/**
 * Header Image.
 *
 * @package drip
 */

$hero_class = '';
if ( has_header_image() ) {
	$hero_class .= 'p-hero--original-image';
	?>
<div class="p-hero <?php echo esc_html( $hero_class ); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col">
				<p class="p-hero__large-text">
					<?php echo esc_html( get_theme_mod( 'hero_copy', 'drip' ) ); ?>
				</p>
				<p class="p-hero__small-text">
					<?php echo esc_html( get_theme_mod( 'hero_tagline', 'Drip is a simple WordPress theme that makes customization easy.' ) ); ?>
				</p>
			</div>
		</div>
	</div>
	<div style="background-image:url(<?php echo esc_url( get_header_image() ); ?>);" class="c-hero-background"></div>
</div>
	<?php
} else {
	?>
<div class="p-hero p-hero--default-image">
	<h2 class="p-hero__large-text">
		<?php echo esc_html( get_theme_mod( 'hero_copy' ) ); ?>
	</h2>
	<p class="p-hero__small-text">
		<?php echo esc_html( get_theme_mod( 'hero_tagline' ) ); ?>
	</p>
</div>
<div class="c-background"></div>
	<?php
}
