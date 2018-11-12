<?php
/**
 * Register customizations.
 *
 * @package Drip
 * @since   1.0.0
 */

/**
 * Register customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize the customizations registered.
 */
function drip_customize_register( $wp_customize ) {
	$pages           = get_pages();
	$option_pages    = array();
	$option_pages[0] = esc_html__( 'Select page', 'drip' );
	foreach ( $pages as $page ) {
		$option_pages[ $page->ID ] = $page->post_title;
	}

	/*
	 * ---------------------------------
	 *  Global Settings
	 * ---------------------------------
	 */
	$wp_customize->add_panel(
		'global_setting',
		array(
			'title'    => 'Global Settings',
			'priority' => 130,
		)
	);
	$wp_customize->add_section(
		'setting_sidebar',
		array(
			'title'    => __( 'Sidebar Settings', 'drip' ),
			'priority' => 1,
			'panel'    => 'global_setting',
		)
	);

	// Sidebar Position.
	$wp_customize->add_setting(
		'sidebar_position',
		array(
			'default'           => 'right',
			'sanitize_callback' => 'drip_sanitize_radio',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'sidebar_position',
			array(
				'label'    => __( 'Sidebar Position', 'drip' ),
				'section'  => 'setting_sidebar',
				'priority' => 1,
				'type'     => 'radio',
				'choices'  => array(
					'right'  => __( 'Right Sidebar (default)', 'drip' ),
					'left'   => __( 'Left Sidebar', 'drip' ),
					'bottom' => __( 'Bottom Sidebar', 'drip' ),
				),
			)
		)
	);

	/*
	 * ---------------------------------
	 *  Header Settings
	 * ---------------------------------
	 */
	$wp_customize->add_panel(
		'header_setting',
		array(
			'title'    => 'Header Settings',
			'priority' => 130,
		)
	);

	// Header > layout.
	$wp_customize->add_section(
		'header_setting_layout',
		array(
			'title'    => __( 'Header layout', 'drip' ),
			'priority' => 1,
			'panel'    => 'header_setting',
		)
	);
	$wp_customize->add_setting(
		'header_layout',
		array(
			'default'           => '1row',
			'sanitize_callback' => 'drip_sanitize_radio',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'header_layout',
			array(
				'label'       => __( 'Header layout', 'drip' ),
				'description' => __( 'Please choose your preferred header layout.', 'drip' ),
				'section'     => 'header_setting_layout',
				'priority'    => 1,
				'type'        => 'radio',
				'choices'     => array(
					'1row' => __( '1row (default)', 'drip' ),
					'2row' => __( '2row', 'drip' ),
				),
			)
		)
	);

	/**
	 * Hero Section
	 */
	$wp_customize->add_panel(
		'hero_setting',
		array(
			'title'    => 'Section: Hero Setting',
			'priority' => 130,
		)
	);

	// Hero > general section.
	$wp_customize->add_section(
		'hero_setting_general',
		array(
			'title'    => __( 'General', 'drip' ),
			'priority' => 1,
			'panel'    => 'hero_setting',
		)
	);
	$wp_customize->add_setting(
		'hero_display',
		array(
			'default'           => false,
			'sanitize_callback' => 'drip_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'hero_display',
			array(
				'label'       => __( 'Hide section', 'drip' ),
				'description' => __( 'If checked the hero section will be hidden.', 'drip' ),
				'section'     => 'hero_setting_general',
				'priority'    => 1,
				'type'        => 'checkbox',
			)
		)
	);

	// Hero > text section.
	$wp_customize->add_section(
		'hero_setting_text',
		array(
			'title'    => __( 'Text', 'drip' ),
			'priority' => 1,
			'panel'    => 'hero_setting',
		)
	);
	$wp_customize->add_setting(
		'hero_copy',
		array(
			'default'           => 'Drip',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'hero_copy',
			array(
				'label'       => __( 'Hero copy', 'drip' ),
				'description' => __( 'Please enter copy texts for Hero section.', 'drip' ),
				'section'     => 'hero_setting_text',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'hero_tagline',
		array(
			'default'           => 'Drop is a simple WordPress theme that makes customization easy.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'hero_tagline',
			array(
				'label'       => __( 'Hero tagline', 'drip' ),
				'description' => __( 'Please enter tagline texts for Hero section.', 'drip' ),
				'section'     => 'hero_setting_text',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	/**
	 * Feature Section
	 */
	$wp_customize->add_panel(
		'feature_setting',
		array(
			'title'    => 'Section: Feature Setting',
			'priority' => 140,
		)
	);

	$wp_customize->add_section(
		'section_feature_general',
		array(
			'title'    => __( 'General', 'drip' ),
			'priority' => 1,
			'panel'    => 'feature_setting',
		)
	);
	$wp_customize->add_setting(
		'feature_display',
		array(
			'default'           => false,
			'sanitize_callback' => 'drip_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_display',
			array(
				'label'       => __( 'Hide feature', 'drip' ),
				'description' => __( 'If checked the feature section will be hidden.', 'drip' ),
				'section'     => 'section_feature_general',
				'priority'    => 1,
				'type'        => 'checkbox',
			)
		)
	);

	// feature > heading section.
	$wp_customize->add_section(
		'section_feature_heading',
		array(
			'title'    => __( 'Heading', 'drip' ),
			'priority' => 1,
			'panel'    => 'feature_setting',
		)
	);
	$wp_customize->add_setting(
		'feature_heading',
		array(
			'default'           => 'Feature',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_heading',
			array(
				'label'       => __( 'Feature heading', 'drip' ),
				'description' => __( 'Please enter heading texts for feature section.', 'drip' ),
				'section'     => 'section_feature_heading',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// feature > icon1 section.
	$wp_customize->add_section(
		'section_feature_icon1',
		array(
			'title'    => __( 'Icon1', 'drip' ),
			'priority' => 1,
			'panel'    => 'feature_setting',
		)
	);
	$wp_customize->add_setting(
		'feature_icon1',
		array(
			'default'           => 'palette',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_icon1',
			array(
				'label'       => __( 'Please select the icon', 'drip' ),
				'description' => __( 'Please select the icon you want to display from <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Awesome</a>.', 'drip' ),
				'section'     => 'section_feature_icon1',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'feature_text1',
		array(
			'default'           => 'Simple and sophisticated design',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_text1',
			array(
				'label'       => __( 'Posts select the icon', 'drip' ),
				'description' => __( 'Please enter text for feature section.', 'drip' ),
				'section'     => 'section_feature_icon1',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// feature > icon2 section.
	$wp_customize->add_section(
		'section_feature_icon2',
		array(
			'title'    => __( 'Icon2', 'drip' ),
			'priority' => 1,
			'panel'    => 'feature_setting',
		)
	);
	$wp_customize->add_setting(
		'feature_icon2',
		array(
			'default'           => 'mobile-alt',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_icon2',
			array(
				'label'       => __( 'Please select the icon', 'drip' ),
				'description' => __( 'Please select the icon you want to display from <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Awesome</a>.', 'drip' ),
				'section'     => 'section_feature_icon2',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'feature_text2',
		array(
			'default'           => 'Smartphone compatible',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_text2',
			array(
				'label'       => __( 'Posts select the icon', 'drip' ),
				'description' => __( 'Please enter text for feature section.', 'drip' ),
				'section'     => 'section_feature_icon2',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// feature > icon3 section.
	$wp_customize->add_section(
		'section_feature_icon3',
		array(
			'title'    => __( 'Icon3', 'drip' ),
			'priority' => 1,
			'panel'    => 'feature_setting',
		)
	);
	$wp_customize->add_setting(
		'feature_icon3',
		array(
			'default'           => 'laptop',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_icon3',
			array(
				'label'       => __( 'Please select the icon', 'drip' ),
				'description' => __( 'Please select the icon you want to display from <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">Font Awesome</a>.', 'drip' ),
				'section'     => 'section_feature_icon3',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'feature_text3',
		array(
			'default'           => 'Easy customization',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'feature_text3',
			array(
				'label'       => __( 'Posts select the icon', 'drip' ),
				'description' => __( 'Please enter text for feature section.', 'drip' ),
				'section'     => 'section_feature_icon3',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	/**
	 * Posts Section
	 */
	$wp_customize->add_panel(
		'posts_setting',
		array(
			'title'    => 'Section: Posts Setting',
			'priority' => 150,
		)
	);

	// Posts > general section.
	$wp_customize->add_section(
		'posts_setting_general',
		array(
			'title'    => __( 'General', 'drip' ),
			'priority' => 1,
			'panel'    => 'posts_setting',
		)
	);
	$wp_customize->add_setting(
		'posts_display',
		array(
			'default'           => false,
			'sanitize_callback' => 'drip_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'posts_display',
			array(
				'label'       => __( 'Hide posts', 'drip' ),
				'description' => __( 'If checked the posts section will be hidden.', 'drip' ),
				'section'     => 'posts_setting_general',
				'priority'    => 1,
				'type'        => 'checkbox',
			)
		)
	);
	$wp_customize->add_setting(
		'posts_background_color',
		array(
			'default'           => '#f3f3f3',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'posts_background_color',
			array(
				'label'       => __( 'Select blackground color', 'drip' ),
				'description' => __( 'If checked the contact section will be hidden.', 'drip' ),
				'section'     => 'posts_setting_general',
				'priority'    => 1,
			)
		)
	);

	// Posts > heading section.
	$wp_customize->add_section(
		'posts_setting_heading',
		array(
			'title'    => __( 'Heading', 'drip' ),
			'priority' => 1,
			'panel'    => 'posts_setting',
		)
	);
	$wp_customize->add_setting(
		'posts_heading',
		array(
			'default'           => 'Posts',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'posts_heading',
			array(
				'label'       => __( 'Posts heading', 'drip' ),
				'description' => __( 'Please enter heading texts for posts section.', 'drip' ),
				'section'     => 'posts_setting_heading',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// Posts > column section.
	$wp_customize->add_section(
		'posts_setting_column',
		array(
			'title'    => __( 'Column', 'drip' ),
			'priority' => 1,
			'panel'    => 'posts_setting',
		)
	);
	$wp_customize->add_setting(
		'posts_number',
		array(
			'default'           => '4',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'posts_number',
			array(
				'label'       => __( 'Number of posts to display', 'drip' ),
				'description' => __( 'Please choose the number of posts to display.', 'drip' ),
				'section'     => 'posts_setting_column',
				'priority'    => 1,
				'type'        => 'select',
				'choices'     => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
					'7' => '7',
					'8' => '8',
				),
			)
		)
	);
	$wp_customize->add_setting(
		'posts_column_number',
		array(
			'default'           => '4',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'posts_column_number',
			array(
				'label'       => __( 'Number of post columns', 'drip' ),
				'description' => __( 'Please select the number of post columns to display.', 'drip' ),
				'section'     => 'posts_setting_column',
				'priority'    => 1,
				'type'        => 'select',
				'choices'     => array(
					'12' => '1',
					'6'  => '2',
					'4'  => '3',
					'3'  => '4',
				),
			)
		)
	);

	// Posts > button section.
	$wp_customize->add_section(
		'posts_setting_button',
		array(
			'title'    => __( 'Button', 'drip' ),
			'priority' => 1,
			'panel'    => 'posts_setting',
		)
	);
	$wp_customize->add_setting(
		'posts_button',
		array(
			'default'           => '/blog',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'posts_button',
			array(
				'label'       => __( 'Posts button URL', 'drip' ),
				'description' => __( 'Please enter the URL to set for the button.', 'drip' ),
				'section'     => 'posts_setting_button',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'posts_button-text',
		array(
			'default'           => 'More',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'posts_button-text',
			array(
				'label'       => __( 'Posts button text', 'drip' ),
				'description' => __( 'Please enter the text to set for the button.', 'drip' ),
				'section'     => 'posts_setting_button',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	/**
	 * Recruit Section
	 */
	$wp_customize->add_panel(
		'recruit_setting',
		array(
			'title'    => 'Section: Recruit Setting',
			'priority' => 160,
		)
	);

	// Recruit > general section.
	$wp_customize->add_section(
		'recruit_setting_general',
		array(
			'title'    => __( 'General', 'drip' ),
			'priority' => 1,
			'panel'    => 'recruit_setting',
		)
	);
	$wp_customize->add_setting(
		'recruit_display',
		array(
			'default'           => false,
			'sanitize_callback' => 'drip_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'recruit_display',
			array(
				'label'       => __( 'Hide section', 'drip' ),
				'description' => __( 'If checked the recruit section will be hidden.', 'drip' ),
				'section'     => 'recruit_setting_general',
				'priority'    => 1,
				'type'        => 'checkbox',
			)
		)
	);

	// Recruit > heading section.
	$wp_customize->add_section(
		'recruit_setting_heading',
		array(
			'title'    => __( 'Heading', 'drip' ),
			'priority' => 1,
			'panel'    => 'recruit_setting',
		)
	);
	$wp_customize->add_setting(
		'recruit_heading',
		array(
			'default'           => 'Recruit',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'recruit_heading',
			array(
				'label'       => __( 'Posts heading', 'drip' ),
				'description' => __( 'Please enter heading texts for recruit section.', 'drip' ),
				'section'     => 'recruit_setting_heading',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// Recruit > text section.
	$wp_customize->add_section(
		'recruit_setting_text',
		array(
			'title'    => __( 'Text', 'drip' ),
			'priority' => 1,
			'panel'    => 'recruit_setting',
		)
	);
	$wp_customize->add_setting(
		'recruit_text',
		array(
			'default'           => 'We are currently looking for someone to work with us at our company.',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'recruit_text',
			array(
				'label'       => __( 'Recruit copy', 'drip' ),
				'description' => __( 'Please enter the URL to set for the button.', 'drip' ),
				'section'     => 'recruit_setting_text',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// Recruit > button section.
	$wp_customize->add_section(
		'recruit_setting_button',
		array(
			'title'    => __( 'Button', 'drip' ),
			'priority' => 1,
			'panel'    => 'recruit_setting',
		)
	);
	$wp_customize->add_setting(
		'recruit_button',
		array(
			'default'           => '/recruit',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'recruit_button',
			array(
				'label'       => __( 'Posts button URL', 'drip' ),
				'description' => __( 'Please enter the URL to set for the button.', 'drip' ),
				'section'     => 'recruit_setting_button',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'recruit_button-text',
		array(
			'default'           => 'More',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'recruit_button-text',
			array(
				'label'       => __( 'Posts button text', 'drip' ),
				'description' => __( 'Please enter the text to set for the button.', 'drip' ),
				'section'     => 'recruit_setting_button',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	/**
	 * Original Section
	 */
	$wp_customize->add_panel(
		'original1_setting',
		array(
			'title'    => 'Section: Original Setting',
			'priority' => 160,
		)
	);

	// Original > general section.
	$wp_customize->add_section(
		'original1_setting_general',
		array(
			'title'    => __( 'General', 'drip' ),
			'priority' => 1,
			'panel'    => 'original1_setting',
		)
	);
	$wp_customize->add_setting(
		'original1_display',
		array(
			'default'           => false,
			'sanitize_callback' => 'drip_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'original1_display',
			array(
				'label'       => __( 'Hide section', 'drip' ),
				'description' => __( 'If checked the original contents section will be hidden.', 'drip' ),
				'section'     => 'original1_setting_general',
				'priority'    => 1,
				'type'        => 'checkbox',
			)
		)
	);

	// Original > heading section.
	$wp_customize->add_section(
		'original1_setting_heading',
		array(
			'title'    => __( 'Heading', 'drip' ),
			'priority' => 1,
			'panel'    => 'original1_setting',
		)
	);
	$wp_customize->add_setting(
		'original1_heading',
		array(
			'default'           => 'Custom',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'original1_heading',
			array(
				'label'       => __( 'Original contents heading', 'drip' ),
				'description' => __( 'Please enter heading texts for original contents section.', 'drip' ),
				'section'     => 'original1_setting_heading',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// Original > pages section.
	$wp_customize->add_section(
		'original1_setting_pages',
		array(
			'title'    => __( 'Pages', 'drip' ),
			'priority' => 1,
			'panel'    => 'original1_setting',
		)
	);
	$wp_customize->add_setting(
		'original1_select_pages',
		array(
			'default'           => __( '0', 'drip' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'original1_select_pages',
			array(
				'label'       => __( 'Pages to display', 'drip' ),
				'description' => __( 'Please select the Pages to display.', 'drip' ),
				'section'     => 'original1_setting_pages',
				'priority'    => 1,
				'type'        => 'select',
				'choices'     => $option_pages,
			)
		)
	);

	/**
	 * Contact Section
	 */
	$wp_customize->add_panel(
		'contact_setting',
		array(
			'title'    => 'Section: Contact Setting',
			'priority' => 170,
		)
	);

	// Contact > general section.
	$wp_customize->add_section(
		'contact_setting_general',
		array(
			'title'    => __( 'General', 'drip' ),
			'priority' => 1,
			'panel'    => 'contact_setting',
		)
	);
	$wp_customize->add_setting(
		'contact_display',
		array(
			'default'           => false,
			'sanitize_callback' => 'drip_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'contact_display',
			array(
				'label'       => __( 'Hide section', 'drip' ),
				'description' => __( 'If checked the contact section will be hidden.', 'drip' ),
				'section'     => 'contact_setting_general',
				'priority'    => 1,
				'type'        => 'checkbox',
			)
		)
	);
	$wp_customize->add_setting(
		'contact_background_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'contact_background_color',
			array(
				'label'       => __( 'Select blackground color', 'drip' ),
				'description' => __( 'If checked the contact section will be hidden.', 'drip' ),
				'section'     => 'contact_setting_general',
				'priority'    => 1,
			)
		)
	);

	// Contact > copy section.
	$wp_customize->add_section(
		'contact_setting_copy',
		array(
			'title'    => __( 'Copy', 'drip' ),
			'priority' => 1,
			'panel'    => 'contact_setting',
		)
	);
	$wp_customize->add_setting(
		'contact_copy',
		array(
			'default'           => __( 'Please do not hesitate to contact us regarding media postings and coverage etc.', 'drip' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'contact_copy',
			array(
				'label'       => __( 'Contact copy', 'drip' ),
				'description' => __( 'Please enter the copy text.', 'drip' ),
				'section'     => 'contact_setting_copy',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);

	// Contact > button section.
	$wp_customize->add_section(
		'contact_setting_button',
		array(
			'title'    => __( 'Button', 'drip' ),
			'priority' => 1,
			'panel'    => 'contact_setting',
		)
	);
	$wp_customize->add_setting(
		'contact_button',
		array(
			'default'           => '/contact',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'contact_button',
			array(
				'label'       => __( 'Posts button URL', 'drip' ),
				'description' => __( 'Please enter the URL to set for the button.', 'drip' ),
				'section'     => 'contact_setting_button',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
	$wp_customize->add_setting(
		'contact_copy',
		array(
			'default'           => 'More',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_setting(
		'contact_button-text',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'contact_button-text',
			array(
				'label'       => __( 'Posts button text', 'drip' ),
				'description' => __( 'Please enter the text to set for the button.', 'drip' ),
				'section'     => 'contact_setting_button',
				'priority'    => 1,
				'type'        => 'text',
			)
		)
	);
}
add_action( 'customize_register', 'drip_customize_register' );
