    <section class="banner">
      <div class="masthead">
        <?php 
          $image = get_field('image');
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          if( $image ) {
              echo wp_get_attachment_image( $image, $size );
          }
        ?>
        </div>
        <div class="image-content">
            <h3><?php the_field('image-content-h3') ?> </h3>

            <h1><?php the_field('image-content-h1') ?></h1>

            <?php 
                $link = get_field('image-button');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn image-button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?><i class="fa-solid fa-arrow-right-long"></i>
                  </a>
                  <?php endif; ?>      
                  
        </div>

</section>
