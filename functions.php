<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'plane-icons' ) );
        wp_enqueue_style('jquery-fab-button', trailingslashit( get_stylesheet_directory_uri() ) . 'css/jquery-fab-button.css');
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

if ( !function_exists( 'sussna_scripts' ) ):
    function sussna_scripts() {
        wp_enqueue_script('jquery-fab-button', get_stylesheet_directory_uri() . '/js/jquery-fab-button.js', array( 'jquery' ), '20210216', true );
    }
endif;
add_action( 'wp_enqueue_scripts', 'sussna_scripts' );
