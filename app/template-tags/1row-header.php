<?php
/**
 * The template for displaying 1row header of each pages.
 *
 * @package  drip
 * @since    drip 1.0.0
 */

?>

<div class="row align-items-center">
	<div class="col-9 col-md-3">
		<header class="l-header__inner">
			<?php get_template_part( 'app/template-tags/site-branding' ); ?>
		</header>
	</div>
	<div class="col-3 d-md-none">
		<?php get_template_part( 'app/template-tags/hamburger-button' ); ?>
	</div>
	<div class="col-md-9 d-none d-md-block">
		<?php get_template_part( 'app/template-tags/global-nav' ); ?>
	</div>
</div>
