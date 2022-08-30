<?php
/* Table of Contents 
 *
 * Admin Whitelabel
 * TinyMCE Options
 * Block Editor Options
 * Page Excerpts
 */

/** ----- ADMIN WHITELABEL ----- **/

/**
 * Output style to change logo on login
 *
 * @return void
 */
add_action( 'login_head', 'fx_login_logo' );
function fx_login_logo() {
    ?>
    <style type="text/css">
        h1 a {
            background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/admin-logo.png') !important;
            background-size: 175px 175px !important;
            height: 175px !important;
            width: 175px !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
        .login form { margin-top: 25px !important; }

        #nav {
            float: right !important;
            width: 50%;
            padding: 0 !important;
            text-align: right !important;
        }

        #backtoblog {
            float: left !important;
            width: 50%;
            padding: 0 !important;
            margin-top: 24px;
        }
    </style>
    <?php
}


/**
 * Removes Items from the sidebar that aren't needed
 *
 * @return void
 */
add_action( 'admin_menu', 'fx_remove_admin_menu_items' );
function fx_remove_admin_menu_items() {
    global $menu;

    // array of item names to remove
    $remove_menu_items = array(
        __( 'Comments' ),
    );

    end( $menu );
    while ( prev( $menu ) ) {
        $item = explode( ' ', $menu[ key( $menu ) ][0] );
        if ( in_array( null !== $item[0] ? $item[0] : '', $remove_menu_items, true ) ) {
            unset( $menu[ key( $menu ) ] );
        }
    }
}


/**
 * Removes nodes from admin bar to make for white labeled
 *
 * @param  class $wp_toolbar the WordPress toolbar instance.
 * @return class             returns the modified toolbar
 */
add_action( 'admin_bar_menu', 'fx_remove_admin_bar_menus', 999 );
function fx_remove_admin_bar_menus( $wp_toolbar ) {
    $wp_toolbar->remove_node( 'wp-logo' );
    return $wp_toolbar;
}


/**
 * Remove the defualt dashboard widgets for orgs
 *
 * @return void
 */
add_action( 'wp_dashboard_setup', 'fx_remove_dashboard_widgets', 0 );
function fx_remove_dashboard_widgets() {
    remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
}


/**
 * Remove the WordPress text at the bottom of the admin
 *
 * @param  string $text current footer text.
 * @return string the changed footer text
 */
add_filter( 'update_footer', 'fx_remove_footer_text', 999 );
add_filter( 'admin_footer_text', 'fx_remove_footer_text' );
function fx_remove_footer_text() {
    return '';
}


/**
 * Change logo URL on WP login page to point to site's homepage
 *
 * @return string 	Homepage URL
 */
add_filter( 'login_headerurl', function() {
	return get_home_url();
});

/** ----- TINYMCE OPTIONS ----- **/

/**
 * Add "Styles" drop-down
 *
 * @param  array $buttons current buttons to be setup.
 * @return array
 */
add_filter( 'mce_buttons_2', 'fx_mce_editor_buttons' );
function fx_mce_editor_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/**
 * Add styles/classes to the "Styles" drop-down
 *
 * @param  array $settings Settings array for TinyMCE.
 * @return array
 */
add_filter( 'tiny_mce_before_init', 'fx_mce_before_init' );
function fx_mce_before_init( $settings ) {
    $style_formats = array(
        array(
            'title'    => 'Button',
            'selector' => 'a',
            'classes'  => 'btn',
        ),

        /*
        Examples for adding styles
        array(
            'title' => 'Call Out Text',
            'selector' => 'p',
            'classes' => 'callout'
        )
        ,array(
            'title' => 'Warning Box',
            'block' => 'div',
            'classes' => 'warning box',
            'wrapper' => true
        )
        ,array(
            'title' => 'Red Uppercase Text',
            'inline' => 'span',
            'styles' => array(
                'color' => '#ff0000',
                'fontWeight' => 'bold',
                'textTransform' => 'uppercase'
            )
        )
        */
    );

    $settings['style_formats'] = wp_json_encode( $style_formats );

    return $settings;
}


/**
 *  Adds "Theme Settings" option page
 *
 *  @return  void
 */
add_action( 'init', 'fx_admin_add_options_page' );
function fx_admin_add_options_page() {
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(
            [
                'page_title'    => 'Theme General Settings',
                'menu_title'    => 'Theme Settings',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ]
        );
    }
}

/** ----- BLOCK EDITOR OPTIONS ----- **/

/** 
 * Remove core block patterns to prevent user confusion
 */
add_action( 'after_setup_theme', 'fx_remove_core_block_patterns' );
function fx_remove_core_block_patterns() {
    remove_theme_support( 'core-block-patterns' );
}

/** 
 * Unregister the "Classic Block" to prevent admin confusion
 */
add_action( 'init', 'fx_unregister_classic_block', 11 );
function fx_unregister_classic_block() {
    unregister_block_type( 'core/freeform' );
}

/**
 * Unregisters the CF7 block, since does not allow you to include
 * an html_id for MCFX tracking. Use the FX CF7 block instead. 
 * 
 * TODO remove from build template in phase II (for builds, delete this comment)
 */
add_action( 'init', 'fx_unregister_cf7_block', 11 );
function fx_unregister_cf7_block() {
    if ( WP_Block_Type_Registry::get_instance()->is_registered( 'contact-form-7/contact-form-selector' ) ) {
        unregister_block_type( 'contact-form-7/contact-form-selector' );
    }
}

/**
 * Restrict the blocks that can be used on the homepage: this should include the top-level acf/homepage-block. 
 * Inner-blocks declared in homepage-block.php will automatically be included
 *
 */
add_filter( 'allowed_block_types', 'fx_restrict_homepage_blocks', 10, 2);
function fx_restrict_homepage_blocks( $allowed_blocks, $post ) {
    
    // TODO update to homepage ID & remove this comment
    if( 63 === $post->ID ) { 
        $allowed_blocks = array( 'acf/homepage-block' );
    } else {
        // TODO add blocks that shouldn't be allowed outside of the homepage to $disallowed_blocks. Block name should be acf/{name}
        $disallowed_blocks = [
            'acf/homepage-block',
            'acf/homepage-masthead-slider', // TODO remove if not using homepage masthead slider
        ];
        
        if ( is_bool($allowed_blocks) ) {
            $block_types = WP_Block_Type_Registry::get_instance()->get_all_registered();
            $allowed_blocks = array_keys( $block_types );
        }
        
        foreach ($disallowed_blocks as $unset) {
            $key = array_search($unset, $allowed_blocks);

            if ( $key !== false) {
                unset($allowed_blocks[$key]);
            }
        }
    }

    return array_values($allowed_blocks); 
}


/** ----- PAGE EXCERPTS ----- **/

/**
 * Difficult to auto-generate good excerpts with block editor;
 * allow custom excerpts
 */
add_action( 'init', 'fx_page_supports_excerpts' );
function fx_page_supports_excerpts() {
	add_post_type_support( 'page', 'excerpt' );
}


add_action( 'save_post_page', 'fx_generate_post_excerpt', 99, 2 );
/** Automatically generates a post excerpt for pages without one */
function fx_generate_post_excerpt( $post_id, $post ) {
    if( !has_excerpt( $post_id ) ) {
        $blocks = parse_blocks( $post->post_content );

        if( !empty( $blocks ) ) {
            $block_content = apply_filters( 'the_content', render_block( $blocks[0] ) );
            $content = wp_strip_all_tags($block_content);
            $excerpt_length = apply_filters('excerpt_length', 55);
            $excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
            $text         = wp_trim_words( $content, $excerpt_length, $excerpt_more );
            
            // prevent infinite loop if no excerpt to update
            if (!empty($text) ) {
                $the_post = [
                    'ID'              => $post_id,
                    'post_excerpt'    => $text,
                ];
                
                wp_update_post($the_post);
            }
        }
    }

    return true;
}