<section class="home-synergy-wrapper">
            <div class="home-synergy-image">
            <?php 
              $image = get_field('home_synergy_image');
              $size = 'full'; // (thumbnail, medium, large, full or custom size)
              if( $image ) {
                  echo wp_get_attachment_image( $image, $size );
              }
            ?>
            </div>
            <div class="home-synergy-wrapper-right">
                <div class="home-synergy-content">
                    <h2><?php the_field('title'); ?></h2>
                    <p><?php the_field('home_content'); ?></p>
                    <p><?php the_field('home_content_2'); ?></p>
                </div>
            </div>
</section>