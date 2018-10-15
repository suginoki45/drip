<?php
/**
 * Sets up options of wp_link_pages.
 *
 * @package Drip
 * @since   1.0.0
 */

wp_link_pages(
	array(
		'before'           => '<nav><ul class="c-pagination"><li>',
		'after'            => '</li></ul></nav>',
		'link_before'      => '',
		'link_after'       => '',
		'separator'        => '</li><li>',
		'nextpagelink'     => '&gt;',
		'previouspagelink' => '%lt;',
		'pagelink'         => '<span>%</span>',
	)
);
