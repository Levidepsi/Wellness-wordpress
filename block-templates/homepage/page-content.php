<section class="home-card-wrapper container ">
                <div class="home-content row">
                    <?php if( have_rows('home-card') ):?>
                    <?php while( have_rows('home-card') ): the_row();
                                  $image = get_sub_field('card-image');
                                  ?>
                                  <div class="col-sm-4 col-md-4">
                                      <a href="">
                                          <div class="home-card">
                            
                                        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                                        <h3><?php the_sub_field('title'); ?></h3>
                                        <p><?php the_sub_field('description'); ?></p>
                                  
                                        <span > 
                                            <?php 
                                            $link = get_sub_field('button');
                                            if( $link ): 
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                <a class="hyperlink" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                                <?php echo esc_html( $link_title ); ?><i class="fa-solid fa-angle-right"></i>
                                            </a>
                                            <?php endif; ?>
                                        
                                        </span>
                                    </div>
                                </a>
                            </div> 
                                <?php endwhile; ?>

                             <?php endif; ?>
                </div>
</section>

