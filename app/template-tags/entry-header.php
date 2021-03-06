<?php
/**
 * The template for displaying entry header of each pages.
 *
 * @package drip
 * @since 1.0.0
 */

if ( is_single() && ! is_attachment() ) {
	$category      = get_the_category();
	$category_id   = $category[0]->cat_ID;
	$category_name = $category[0]->name;
	$category_slug = $category[0]->category_nicename;
	$category_link = get_category_link( $category_id );
	?>
	<div class="c-entry__header">
		<header>
			<p class="c-entry__header__term">
				<a href="<?php echo esc_html( $category_link ); ?>">
					<?php echo esc_html( $category_name ); ?>
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
	<?php
} elseif ( is_page() ) {
	?>
	<div class="c-entry__header">
		<header>
			<h1 class="c-entry__header__title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
			<?php if ( has_post_thumbnail() ) : ?>
			<div class="c-entry__header__eyecatch">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php endif; ?>
		</header>
	</div>
	<?php
} elseif ( is_404() ) {
	?>
	<div class="c-entry__header">
		<header>
			<h1 class="c-entry__header__title">
				<?php esc_html_e( '404 Page Not Found. ', 'drip' ); ?>
			</h1>
		</header>
	</div>
	<?php
}
