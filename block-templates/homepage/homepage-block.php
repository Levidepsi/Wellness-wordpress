<?php

/** 
 * $template note:
 * 
 * Block names should be prefixed with acf/. So if the name you specified in
 * fx_register_block is 'your-block-name', the name you should use here is
 * 'acf/your-block-name' 
 */

$template = [
    // TODO add additional blocks here and delete this comment
    ['acf/homepage-masthead'],
    ['acf/homepage-page-content'],
    ['acf/homepage-explorer'],
    ['acf/homepage-explorer-recovery'],
    ['acf/homepage-testimonials'],
    ['acf/homepage-home-buttons'],
    ['acf/homepage-home-rating'],
    ['acf/homepage-home-video'],
    ['acf/homepage-home-blogs'],
    ['acf/homepage-home-location'],
    ['acf/homepage-home-synergy'],
    ['acf/homepage-home-cta-wrapper'],
];

?>

<div>
    <InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) )?>" templateLock="all" />
</div>
