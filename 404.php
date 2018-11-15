<?php
/**
 * The 404 template.
 *
 * @package   Drip
 * @copyright Copyright (c) 2018 Glatch
 * @license   GNU General Public License v2.0
 * @since     drip 1.0
 */

get_header();
?>

<div class="container l-main">
	<div class="row">
		<div class="col-md-8 l-contents">
			<div class="c-entry">
				<div <?php post_class( 'c-entry__items' ); ?>>
					<main>
						<?php get_template_part( 'app/template-tags/entry-header' ); ?>
						<div class="c-entry__content">
							<p><?php esc_html_e( 'Sorry, the page you were looking for doesn’t exist. ', 'drip' ); ?></p>
							<?php get_search_form(); ?>
						</div>
					</main>
				</div>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
