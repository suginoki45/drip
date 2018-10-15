<?php
/**
 * The Copyright template.
 *
 * @package   Drip
 * @since     drip 1.0
 */

?>

<div class="c-copyright">
<?php
$drip_allowed_html = array(
	'a'      => array(
		'href'    => array(),
		'onclick' => array(),
		'target'  => array(),
	),
	'p'      => array(
		'style'  => array(),
		'align'  => array(),
		'target' => array(),
	),
	'br'     => array(),
	'strong' => array(),
	'b'      => array(),
	'small'  => array(),
);
?>

<?php echo wp_kses( drip_copy(), $drip_allowed_html ); ?>

<p>
	<?php echo wp_kses( drip_credit(), $drip_allowed_html ); ?>
</p>
</div>
