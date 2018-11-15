<?php
/**
 * The Single Page template.
 *
 * @package   Drip
 * @copyright Copyright (c) 2018 Glatch
 * @license   GNU General Public License v2.0
 * @since     1.0.0
 */

get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
	?>

	<div class="container l-main">
		<?php if ( sidebar_position() === 'right' ) : ?>
			<div class="row">
				<div class="col-md-8 l-contents">
					<?php get_template_part( 'app/template-tags/entry-content' ); ?>
				</div>
				<div class="col-md-4 l-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php elseif ( sidebar_position() === 'left' ) : ?>
			<div class="row">
				<div class="col-md-8 order-last l-contents">
					<?php get_template_part( 'app/template-tags/entry-content' ); ?>
				</div>
				<div class="col-md-4 order-first l-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php elseif ( sidebar_position() === 'bottom' ) : ?>
			<div class="row justify-content-md-center">
				<div class="col-md-8 l-contents">
					<?php get_template_part( 'app/template-tags/entry-content' ); ?>
				</div>
				<div class="col-md-8 l-sidebar">
					<?php get_sidebar(); ?>
				</div>
		</div>
		<?php endif; ?>
	</div>

<?php endwhile; ?>

<?php
get_footer();
