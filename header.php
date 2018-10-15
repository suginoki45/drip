<?php
/**
 * The Header template.
 *
 * @package   Drip
 * @copyright Copyright (c) 2018 Glatch
 * @license   GNU General Public License v2.0
 * @since     drip 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="container l-header">
		<div class="l-<?php echo esc_html( get_theme_mod( 'header_layout', '1row' ) ); ?>-header">
			<?php get_template_part( 'app/template-tags/' . esc_html( get_theme_mod( 'header_layout', '1row' ) ) . '-header' ); ?>
		</div>
	<!-- /.l-header --></div>
	<?php get_template_part( 'app/template-tags/drawer-nav' ); ?>
