<div class="container section-margins">
    <div class="masthead">
    <h1>CONTACT US</h1>
    </div>
    <?php
        $form = get_field('cf7_shortcode');
    
        if( !empty( $form ) ) {
            echo apply_shortcodes( $form );
        }
    ?>
</div>