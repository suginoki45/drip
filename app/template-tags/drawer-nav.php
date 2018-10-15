<?php
/**
 * The template for displaying drawer navi of each pages.
 *
 * @package  drip
 * @since    drip 1.0.0
 */

?>

<div id="js-drawer-nav" class="c-drawer-nav" aria-hidden="true" aria-expanded="false">
	<nav role="navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'drawer-nav',
				'container'      => false,
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'menu_class'     => 'c-navbar',
			)
		);
		?>
	</nav>
</div>
