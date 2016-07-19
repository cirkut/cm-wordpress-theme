<?php
/**
 * Get default link color for Customizer.
 *
 * Abstracted here since at least two functions use it.
 *
 * @return string Hex color code for link color.
 */
function cm_customizer_get_default_link_color() {
	return '#c3251d';
}

/**
 * Get default accent color for Customizer.
 *
 * Abstracted here since at least two functions use it.
 *
 * @return string Hex color code for accent color.
 */
function cm_customizer_get_default_accent_color() {
	return '#c3251d';
}

add_action( 'customize_register', 'cm_customizer_register' );
/**
 * Register settings and controls with the Customizer.
 * 
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function cm_customizer_register() {

	global $wp_customize;

	$wp_customize->add_setting(
		'cm_link_color',
		array(
			'default'           => cm_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cm_link_color',
			array(
				'description' => __( 'Change the default color for linked titles, menu links, post info links and more.', 'cm' ),
			    'label'       => __( 'Link Color', 'cm' ),
			    'section'     => 'colors',
			    'settings'    => 'cm_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'cm_accent_color',
		array(
			'default'           => cm_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'cm_accent_color',
			array(
				'description' => __( 'Change the default color for button hovers.', 'cm' ),
			    'label'       => __( 'Accent Color', 'cm' ),
			    'section'     => 'colors',
			    'settings'    => 'cm_accent_color',
			)
		)
	);

}
