<?php
/**
 * The Home Page template.
 *
 * @package   Drip
 * @copyright Copyright (c) 2018 Glatch
 * @license   GNU General Public License v2.0
 * @since     1.0.0
 */

get_header();
?>

<div class="container l-main">
	<div class="row">
		<div class="l-contents">
			<main>
				<div class="c-entry">
					<div class="container">
						<div class="row">
							<?php if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) :
									the_post();
									$cat      = get_the_category();
									$cat_id   = $cat[0]->cat_ID;
									$cat_name = $cat[0]->name;
									$cat_slug = $cat[0]->category_nicename;
									$cat_link = get_category_link( $cat_id );
									?>
									<div <?php post_class( 'col-md-4 c-entry__items' ); ?>>
										<div class="c-entry__header">
											<header>
												<p class="c-entry__header__term">
													<a href="<?php echo esc_html( $cat_link ); ?>">
														<?php echo esc_html( $cat_name ); ?>
													</a>
												</p>
												<h1 class="c-entry__header__title">
													<a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
													</a>
												</h1>
												<p class="c-entry__header__date">
													<?php echo get_the_date( 'Y. m. d' ); ?>
												</p>
												<?php if ( has_post_thumbnail() ) : ?>
												<div class="c-entry__header__eyecatch">
													<?php the_post_thumbnail(); ?>
												</div>
												<?php endif; ?>
											</header>
										</div>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="c-pagination">
					<?php the_posts_pagination(); ?>
				</div>
			</main>
		</div>
		<?php
		get_footer();
		?>
	</div>
</div>

