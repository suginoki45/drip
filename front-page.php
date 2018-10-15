<?php
/**
 * The Front Page template.
 *
 * @package   Drip
 * @copyright Copyright (c) 2018 Glatch
 * @license   GNU General Public License v2.0
 * @since     drip 1.0.0
 */

get_header();
?>

<?php if ( ! get_theme_mod( 'hero_display', false ) ) : ?>
	<?php get_template_part( 'app/template-tags/hero' ); ?>
<?php endif; ?>

<?php if ( ! get_theme_mod( 'feature_display', false ) ) : ?>
<div class="c-section c-section-feature">
	<section class="container">
		<h2 class="c-heading">
			<span>
				<?php echo esc_html( get_theme_mod( 'feature_heading', 'Feature' ) ); ?>
			</span>
		</h2>
		<div class="row">
			<div class="col-md-4">
				<span class="c-section-feature__icon fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x"></i>
					<i class="fas fa-<?php echo esc_html( get_theme_mod( 'feature_icon1', 'palette' ) ); ?> fa-stack-1x c-section-feature__icon-default"></i>
				</span>
				<h3 class="c-section-feature__heading">
					<?php echo esc_html( get_theme_mod( 'feature_text1', 'Simple and sophisticated design' ) ); ?>
				</h3>
			</div>
			<div class="col-md-4">
				<span class="c-section-feature__icon fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x"></i>
					<i class="fas fa-<?php echo esc_html( get_theme_mod( 'feature_icon2', 'mobile-alt' ) ); ?> fa-stack-1x c-section-feature__icon-default"></i>
				</span>
				<h3 class="c-section-feature__heading">
					<?php echo esc_html( get_theme_mod( 'feature_text2', 'Smartphone compatible' ) ); ?>
				</h3>
			</div>
			<div class="col-md-4">
				<span class="c-section-feature__icon fa-stack fa-4x">
					<i class="fas fa-circle fa-stack-2x"></i>
					<i class="fas fa-<?php echo esc_html( get_theme_mod( 'feature_icon3', 'laptop' ) ); ?> fa-stack-1x c-section-feature__icon-default"></i>
				</span>
				<h3 class="c-section-feature__heading">
					<?php echo esc_html( get_theme_mod( 'feature_text3', 'Easy customization' ) ); ?>
				</h3>
			</div>
		</div>
	</section>
</div>
<?php endif; ?>
<?php if ( ! get_theme_mod( 'posts_display' ) ) : ?>
<div class="c-section" style="background-color: <?php echo esc_html( get_theme_mod( 'posts_background_color', '#f3f3f3' ) ); ?>">
	<section class="container">
		<h2 class="c-heading">
			<span>
				<?php echo esc_html( get_theme_mod( 'posts_heading', 'Post' ) ); ?>
			</span>
		</h2>
			<div class="row c-entries">
				<?php
				$args = array(
					'posts_per_page' => get_theme_mod( 'posts_number' ),
					'post_type'      => 'post',
					'post_status'    => 'publish',
				);
				$my_posts = get_posts( $args );
				foreach ( get_posts( $args ) as $post ) :
					setup_postdata( $post );
					?>
					<div class="col-6 col-md-<?php echo esc_html( get_theme_mod( 'posts_column_number', '3' ) ); ?> c-entries__item">
						<article <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>">
								<img class="c-entries__item__thumb" src="<?php echo esc_html( get_template_directory_uri() ); ?>/dist/img/img_default-thumb01.jpg"	alt="">
								<div class="c-entries__item__body">
									<div class="c-entries__item__info">
										<p class="c-entries__item__info__date">
											<?php echo get_the_date( 'Y. m. d' ); ?>
										</p>
									</div>
									<h2 class="c-entries__item__body__title">
										<?php the_title(); ?>
									</h2>
								</div>
							</a>
						</article>
					</div>
					<?php
				endforeach;
				wp_reset_postdata();
				?>
			</div>
		<?php if ( ! empty( get_theme_mod( 'posts_button' ) ) ) : ?>
			<div class="c-button-holder">
				<a class="c-button" href="<?php echo esc_html( get_theme_mod( 'posts_button' ) ); ?>">
					<span><?php echo esc_html( get_theme_mod( 'posts_button-text' ) ); ?></span>
				</a>
			</div>
		<?php endif; ?>
	</section>
</div>
<?php endif; ?>
<?php if ( ! get_theme_mod( 'recruit_display' ) ) : ?>
	<div class="c-section c-section-bg-image">
		<div class="c-section-bg-image__background"></div>
		<section class="container">
			<div class="row">
				<div class="col">
					<h2 class="c-heading">
						<span>
							<?php echo esc_html( get_theme_mod( 'recruit_heading', 'Recruit' ) ); ?>
						</span>
					</h2>
					<p class="c-section__desc"><?php echo esc_html( get_theme_mod( 'recruit_text', 'We are currently looking for someone to work with us at our company.' ) ); ?></p>
					<?php if ( ! empty( get_theme_mod( 'recruit_button', '/recruit' ) ) ) : ?>
						<div class="c-button-holder">
							<a class="c-button" href="<?php echo esc_html( get_theme_mod( 'recruit_button', '/recruit' ) ); ?>">
								<span><?php echo esc_html( get_theme_mod( 'recruit_button-text', 'More' ) ); ?></span>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</div>
<?php endif; ?>
<?php if ( ! get_theme_mod( 'original1_display', false ) ) : ?>
<div class="c-section">
	<section class="container">
		<div class="row">
			<div class="col">
				<section>
					<h2 class="c-heading">
						<span>
							<?php echo esc_html( get_theme_mod( 'original1_heading', 'Custom' ) ); ?>
						</span>
					</h2>
					<?php
					$page_id = get_theme_mod( 'original1_select_pages' );
					$content = get_page( $page_id );
					echo wp_kses_post( $content->post_content );
					?>
				</section>
			</div>
		</div>
	</section>
</div>
<?php endif; ?>
<?php if ( ! get_theme_mod( 'contact_display', false ) ) : ?>
<div class="c-contact" style="background-color: <?php echo esc_html( get_theme_mod( 'contact_background_color', '#000' ) ); ?>">
	<section class="container">
		<div class="row align-items-center">
			<div class="c-contact__item col-md-8">
				<p><?php echo esc_html( get_theme_mod( 'contact_copy', 'Please do not hesitate to contact us regarding media postings and coverage etc.' ) ); ?></p>
			</div>
			<div class="c-contact__item col-md-4">
				<a class="c-button" href="<?php echo esc_html( get_theme_mod( 'contact_button', '/contact' ) ); ?>">
					<span><?php echo esc_html( get_theme_mod( 'contact_button-text', 'More' ) ); ?></span>
				</a>
			</div>
		</div>
	</section>
</div>
<?php endif; ?>
</main>
<?php
get_footer();
