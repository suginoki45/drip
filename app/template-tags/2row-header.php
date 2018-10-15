<?php
/**
 * The template for displaying 2row header of each pages.
 *
 * @package  drip
 * @since    drip 1.0.0
 */

?>

<div class="row align-items-center">
	<div class="offset-3 col-6 offset-md-0 col-md-12">
		<header class="l-header__inner">
			<?php get_template_part( 'app/template-tags/site-branding' ); ?>
		</header>
	</div>
	<div class="col-3 d-md-none">
		<?php get_template_part( 'app/template-tags/hamburger-button' ); ?>
	</div>
</div>
<div class="row align-items-center">
	<div class="col-12">
		<div class="p-global-nav d-none d-md-block">
			<?php get_template_part( 'app/template-tags/global-nav' ); ?>
		</div>
	</div>
</div>
