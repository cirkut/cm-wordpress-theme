<?php
/**
 * Genesis Sample.
 *
 * This file adds the default theme settings to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

add_filter( 'genesis_theme_settings_defaults', 'genesis_sample_theme_defaults' );
/**
* Updates theme settings on reset.
*
* @since 2.2.3
*/
function genesis_sample_theme_defaults( $defaults ) {

	$defaults['blog_cat_num']              = 6;
	$defaults['content_archive']           = 'full';
	$defaults['content_archive_limit']     = 0;
	$defaults['content_archive_thumbnail'] = 0;
	$defaults['posts_nav']                 = 'numeric';
	$defaults['site_layout']               = 'content-sidebar';

	return $defaults;

}

add_action( 'after_switch_theme', 'genesis_sample_theme_setting_defaults' );
/**
* Updates theme settings on activation.
*/
function genesis_sample_theme_setting_defaults() {

	if ( function_exists( 'genesis_update_settings' ) ) {

		genesis_update_settings( array(
			'blog_cat_num'              => 6,	
			'content_archive'           => 'full',
			'content_archive_limit'     => 0,
			'content_archive_thumbnail' => 0,
			'posts_nav'                 => 'numeric',
			'site_layout'               => 'content-sidebar',
		) );
		
	} 

	update_option( 'posts_per_page', 6 );

}

//* Remove the Genesis title area
remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

add_action( 'genesis_site_title', 'cm_logo' );
/**
* Adds an SVG logo
*/
function cm_logo() {

	$header_image = '<img alt="" src="' . get_stylesheet_directory_uri() . '/images/cm-white.svg" />';
	$header_text = get_bloginfo('title');
	$header_link = get_bloginfo('url');
	printf( '<a class="site-link" href="%s"><span class="site-image">%s</span><span class="site-text">%s</span></a>', $header_link, $header_image, $header_text );

}

add_filter('genesis_footer_creds_text', 'cm_footer_creds_filter');
function cm_footer_creds_filter( $creds ) {
	$fromYear = 2010;
	$thisYear = (int)date('Y');
	$creds = 'Made with &hearts; by ' . get_bloginfo('title') . '. &copy; ' . $fromYear . (($fromYear != $thisYear) ? '-' . $thisYear : '');
	return $creds;
}