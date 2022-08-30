<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <?php // Insert Google Fonts <link> here. Please use &display=swap in your URL! 
    ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <?php
        // gets client logo image set in Theme Settings
        $logo_id    = fx_get_client_logo_image_id(); 
        $home_url   = get_home_url();
    ?>

    <header class="page-header" id="page-header">
        <div class="site-logo-container">
            <a class="site-logo" href="<?php echo esc_url( $home_url ); ?>">
                <?php echo fx_get_image_tag( $logo_id, 'logo' ); ?>
            </a>
        </div>

        <div class="page-header-nav">
            <div class="top-nav">
                <ul>
                    <li>
                        <a class='num' href=""><i class="phone fa-solid fa-phone-volume"></i> <b><?php the_field('phone', 'option') ?></b></a>
                    </li>
                    <li> 
                        <a href="">
                            <button class="btn">
                                CONTACT US<i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                         </a>
                     </li>

                    <li>
                        <a href=""><i class="fa-solid fa-calendar"></i> <b><?php the_field('calendar', 'option') ?></b> </a>
                    </li>

                    <li>
                        <a href=""><i class="fa-solid fa-message"></i> <b><?php the_field('message', 'option') ?></b></a>
                    </li>

                </ul>
                <a class="toggle-search" href="javascript:void(0);" onclick="toggleSearch()"> <i class="search fa-solid fa-magnifying-glass"></i>
                </a>
            </div>
            
            <div class="primary-nav">
                <?php
                    // Output the Header navigation
                    wp_nav_menu(
                        [
                            'container'         => 'nav',
                            'theme_location'    => 'primary_menu',
                        ]
                    );
                ?>
            </div>
        </div>

    </header>
