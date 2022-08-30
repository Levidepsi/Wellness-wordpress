<?php

/**
 * Register FX blocks
 * 
 * fx_register_block() is, at its core, a wrapper function for acf_register_block_type with additional parameters for 
 * our supporting functionality 
 * 
 * @see Guru card: https://app.getguru.com/card/Tn9zzk8c/FX-ACF-Blocks
 * @see more info for acf_register_block_type(): https://www.advancedcustomfields.com/resources/acf_register_block_type/
 * 
 * Below is a reference for the parameters you can pass to fx_register_block(). You can also pass any setting from 
 * acf_register_block_type() to fx_register_acf_block().
 * 
 * Required arguments: "name", "title", and "template"
 * 
 */

// @todo — remove $reference_settings before launch
$reference_settings = array(
    'name'          => '', // (required) (string) unique name to identify block (no spaces)
    'title'         => '', // (required) (string) display title for block
    'template'      => '', // (required) (string) relative path of the template we'll use to load this block (in block-templates/), Ex: innerpage/template.php
    'css'           => '', // (string) block-specific stylesheet path. Assumed to be in /themes/fx/assets/css, so use relative path (e.g. "homepage/homepage-block.css")
    'css_deps'      => [], // (array) CSS dependency handles. These stylesheets will be loaded before this block's specific stylesheet. Dependencies must already be registered.
    'js'            => '', // (string) block-specific script path. Assumed to be in /themes/fx/assets/js, so use relative path (e.g. "homepage/homepage-block.js")
    'js_deps'       => [], // (array) JS dependency handles. These scripts will be loaded before this block's specific script. Dependencies must already be registered.
    'description'   => '', // (string) short description of block. Optional, but blocks should have useful descriptions to indicate purpose of block.
    'category'      => '', // (string) declares which category in the block editor block belongs to. Options: "text", "media", "design", "widgets", and "embed". You can define your own categories.
    'icon'          => '', // (array|string) can be a dashicon or SVG image used to identify the block
    'keywords'      => '', // (array) terms to help find block in block editor
    'post_types'    => [], // (array) if declared, will restrict block to being available for only specified post types. Default is "page".
    'mode'          => '', // (string) display mode for block when you add block in editor. Options: "auto", "preview", "edit". If no mode is selected, it will automatically be set to "edit", unless your block is an "outer block" in which case the default mode should be "preview". Due to these defaults, It is unlikely you will need to use this setting very often. Note: for large acf groups, such as repeaters, it is recommended to stick with the default "edit" mode.
    'supports'      => '', // (associative array) features to support. See https://developer.wordpress.org/block-editor/developers/block-api/block-supports/
);


/**
 * General blocks
 * 
 * These blocks are intended to be used anywhere, including the homepage and innerpage.
 * 
 * Block template path: /themes/fx/block-templates/general
 * Stylesheet path:     /themes/fx/assets/css/general
 * Script path:         /themes/fx/assets/js/general
 * 
 */


/**
 * Create a "FX General Blocks" category in the block editor. Use "fx-general-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX General Blocks', 'fx-general-blocks' );


/**
 * Plan WYSIWYG block for general usage
 * 
 */
fx_register_block(
    [
        'name'          => 'wysiwyg',
        'title'         => 'WYSIWYG',
        'template'      => 'general/wysiwyg.php',
        'description'   => 'A basic "What you see is what you get" editor.',
        'css'           => 'general/wysiwyg.css',
        'post_types'    => [],
    ]
);


/**
 * To avoid issues with CF7 assets, we're creating our own CF7 block. You shouldn't need to touch this section.
 *
 */
$cf7_settings = [
    'name'          => 'cf7-block',
    'title'         => 'CF7 Block',
    'template'      => 'general/cf7-block.php',
    'description'   => 'Adds CF7 block to the page',
    'js_deps'       => [ 'contact-form-7', 'wpcf7-recaptcha', 'google-recaptcha' ],
    'keywords'      => [ 'cf7', 'contact', 'form' ],
    'mode'          => 'edit',
    'post_types'    => [], // all post types
];
$cf7_icon = WP_PLUGIN_DIR . '/contact-form-7/assets/icon.svg';
if( file_exists( $cf7_icon ) ) {
    $cf7_settings['icon'] = file_get_contents( $cf7_icon );
}
fx_register_block( $cf7_settings );

// @todo — add additional general blocks below with the "fx-general-blocks" category



/**
 * Homepage blocks
 * 
 * These blocks are intended to be used ONLY on the homepage.
 * 
 * Block template path: /themes/fx/block-templates/homepage
 * Stylesheet path:     /themes/fx/assets/css/homepage
 * Script path:         /themes/fx/assets/js/homepage
 * 
 */

/**
 * Create a "FX Homepage Blocks" category in the block editor. Use "fx-homepage-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX Homepage Blocks', 'fx-homepage-blocks' );


/**
 * This is the main homepage "outer block." All other homepage blocks should be added within this block in the Block 
 * Editor and in block-templates/homepage/homepage-block.php
 * 
 */


// @todo —  remove this block if not using a homepage masthead slider
fx_register_block(
    [
        'name'          => 'homepage-masthead-slider',
        'title'         => 'Homepage - Masthead Slider',
        'template'      => 'homepage/masthead-slider.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/masthead-slider.css',
        'css_deps'      => [ 'fx_slick' ],
        'js'            => 'homepage/masthead-slider.js',
        'js_deps'       => [ 'fx_slick' ],
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-block',
        'title'         => 'Homepage',
        'template'      => 'homepage/homepage-block.php',
        'description'   => 'The main content block for the homepage',
        'mode'          => 'preview',
        'supports'      => [ 'jsx' => true ], // enables support for inner blocks
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-masthead',
        'title'         => 'Homepage - Masthead ',
        'template'      => 'homepage/masthead.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/masthead.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-page-content',
        'title'         => 'Homepage - Page Content ',
        'template'      => 'homepage/page-content.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/page-content.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-explorer',
        'title'         => 'Homepage - Explorer ',
        'template'      => 'homepage/home-explorer.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/page-content.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-explorer-recovery',
        'title'         => 'Homepage - Explorer Recovery ',
        'template'      => 'homepage/explore-recovery.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/page-content.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-testimonials',
        'title'         => 'Homepage - Testimonials ',
        'template'      => 'homepage/home-testimonials.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-testimonials.css',
        'css_deps'      => [ 'fx_slick' ],
        'category'      => 'fx-homepage-blocks',
        'js'            => 'homepage/home-testimonials.js',
        'js_deps'       => [ 'fx_slick' ],
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-home-buttons',
        'title'         => 'Homepage - Home - buttons ',
        'template'      => 'homepage/home-buttons.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-buttons.css',
        'category'      => 'fx-homepage-blocks',
    ]
);


fx_register_block(
    [
        'name'          => 'homepage-home-rating',
        'title'         => 'Homepage - Home - Rating ',
        'template'      => 'homepage/home-rating.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-rating.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-home-video',
        'title'         => 'Homepage - Home - Video ',
        'template'      => 'homepage/home-video.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-video.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-home-blogs',
        'title'         => 'Homepage - Home - Blogs ',
        'template'      => 'homepage/home-blogs.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-blogs.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-home-location',
        'title'         => 'Homepage - Home - Location ',
        'template'      => 'homepage/home-location.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-location.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-home-synergy',
        'title'         => 'Homepage - Home - Synergy ',
        'template'      => 'homepage/home-synergy.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-synergy.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-home-cta-wrapper',
        'title'         => 'Homepage - Home - CTA ',
        'template'      => 'homepage/home-cta-wrapper.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-cta-wrapper.css',
        'category'      => 'fx-homepage-blocks',
    ]
);

fx_register_block(
    [
        'name'          => 'homepage-home-cta-wrapper',
        'title'         => 'Homepage - Home - CTA ',
        'template'      => 'homepage/home-cta-wrapper.php',
        'description'   => 'Slider block for the homepage masthead.',
        'css'           => 'homepage/home-cta-wrapper.css',
        'category'      => 'fx-homepage-blocks',
    ]
);









// @todo — add additional homepage blocks below with the "fx-homepage-blocks" category



/**
 * Innerpage blocks
 * 
 * These blocks are intended to be used ONLY on innerpages
 * 
 * Block template path: /themes/fx/block-templates/innerpage
 * Stylesheet path:     /themes/fx/assets/css/innerpage
 * Script path:         /themes/fx/assets/js/innerpage
 * 
 */

/**
 * Create a "FX Innerpage Blocks" category in the block editor. Use "fx-innerpage-blocks" as your "category" value in 
 * fx_register_block()
 * 
 */
fx_add_block_category( 'FX Innerpage Blocks', 'fx-innerpage-blocks' );

// @todo — add additional innerpage blocks below with the "fx-innerpage-blocks" category






