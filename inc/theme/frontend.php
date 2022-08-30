<?php

/**
 * Set Up theme support and functionality
 *
 * @return void
 */
add_action( 'after_setup_theme', 'fx_setup' );
function fx_setup() {
    add_editor_style();
    add_theme_support( 'title-tag' );

    // Theme Images
    add_theme_support( 'post-thumbnails' );
    
    // Image Sizes
    add_image_size( 'masthead', 1920, 600 ); // true hard crops, false proportional

    // HTML5 Support
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}


/**
 * Register menu functionality, initilize plugin functionality
 *
 * @return void
 */
add_action( 'init', 'fx_init' );
function fx_init() {
    // Register Menu
    register_nav_menus(
        array(
            'footer_menu'  => 'Navigation items for footer navigation.',
            'main_menu' => 'Navigation items for the main menu.'
        )
    );
}


/**
 *  Register sidebars and widgets
 *
 *  @return  void
 */
add_action( 'widgets_init', 'fx_widget_init' );
function fx_widget_init() {
    // Sidebar
    register_sidebar(
        array(
            'name'          => 'Main Sidebar Widgets',
            'id'            => 'sidebar',
            'description'   => 'Widgets for the default sidebar',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
            'before_widget' => '<div class="widget %2$s" id="%1$s" >',
            'after_widget'  => '</div>',
        )
    );
}


add_filter( 'wpseo_breadcrumb_single_link_wrapper', 'fx_change_breadcrumb_single_wrapper' );
/* Change Yoast default breadcrumb wrapper to li */
function fx_change_breadcrumb_single_wrapper() {
    return 'li';
}


add_filter( 'wpseo_breadcrumb_single_link_with_sep', 'fx_remove_breadcrumb_single_link_sep', 10, 2 );
/* Remove yoast breadcrumb link separator */
function fx_remove_breadcrumb_single_link_sep( $output ) {
    return str_replace( '|', '', $output );
}


/**
 * Prevents WordPress from natively adding "loading='lazy'" to 
 * media elements. (We'll offload that work to WP Rocket.)
 *
 * @return  bool
 */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );


/**
 * Adds bootstrap .container > .row > .col-xxs-12 wrapper around
 * blocks so non-fx blocks can be styled nicely with padding.
 * Note: use the fx_wrap_block filter to change the default wrapping
 *  behavior of a block.
 */
// add_filter( 'render_block', 'fx_wrap_blocks', 10, 2 );
// function fx_wrap_blocks( $block_content, $block ) {
//     $block_name = $block['blockName'];
//     $wrap_block = true;
//     $wrap_block = apply_filters('fx_wrap_block', $wrap_block, $block_name);
    
//     if ( $wrap_block ) {
//         $block_content = '<div class="container"><div class="row"><div class="col-xxs-12">' . $block_content . '</div></div></div>';
//     }

//     return $block_content;
// }

// add_filter('fx_wrap_block', 'fx_block_wrap_defaults', 10, 2);
/**
 * Logic to specify whether or not a block should be wrapped with 
 * a bootstrap wrapper. (Note: this is typically for non-fx blocks)
 */
// function fx_block_wrap_defaults($wrap_block, $block_name) {
//     // Don't wrap empty blocks with no name
//     if ( is_null( $block_name ) )
//         return false;
//     // Don't wrap FX (acf) blocks
//     if ( false !== strpos( $block_name, 'acf/' ) )
//         return false;
//     // Don't wrap button blocks
//     if ( 'core/button' == $block_name )
//         return false;
    
    // TODO add logic for blocks that should/shouldn't be wrapped in a bootstrap row here
    // return $wrap_block;
// }



