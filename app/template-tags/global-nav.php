<?php
/**
 * The template for displaying global navi of each pages.
 *
 * @package  drip
 * @since    drip 1.0.0
 */

?>

<div class="p-global-nav">
	<nav role="navigation">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'global-nav',
				'container'      => false,
				'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'menu_class'     => 'l-global-nav c-navbar',
			)
		);
		?>
	</nav>
</div>
