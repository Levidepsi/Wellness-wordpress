<section class="home-explore">
            <div class="container">
                <div class="explore-header">
                    <h2>Explore Our Header Services</h2>
                </div>

                <!-- repeater -->
                <div class="home-icons">
                    <?php if( have_rows('home-explorer') ):?>
                    <?php while( have_rows('home-explorer') ): the_row();
                     $image = get_sub_field('avatar');
                      ?>
                      <div>
                            <div class="home-explorer-svg">
                            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                            </div>
                            <h2><?php the_sub_field('title'); ?></h2>
                      </div>

                    <?php endwhile; ?>
                    <?php endif; ?>
                    
                  </div> 
 
                      <?php 
                          $link = get_field('home-button');
                          if( $link ): 
                              $link_url = $link['url'];
                              $link_title = $link['title'];
                              $link_target = $link['target'] ? $link['target'] : '_self';
                              ?>
                              <a class="btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                              <?php echo esc_html( $link_title ); ?>
                          </a>
                          <?php endif; ?>

                   <!-- end of repeater -->

               </div>
</section> 