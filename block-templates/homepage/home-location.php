<section class="home-location">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-7">
                        <h5><?php the_field('location'); ?></h5>
                        <h2><?php the_field('location_ Title'); ?></h2>
                        <p><?php the_field('location_content'); ?></p>
                        <p><?php the_field('location_content_bottom'); ?></p>

                        <div class="button-wrapper">
                        <?php 
                            $link = get_field('location_button');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn btn-primary " href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?>
                                 <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="loc-wrap col-sm-6 col-md-offset-1 col-md-4">
                        <div class="location-content">
                            <?php if( have_rows('location_name') ): ?>
                                <?php while( have_rows('location_name') ): the_row(); 
                                    $image = get_sub_field('location_image');
                                    ?>
                                    
                                    <div class="accordion__panel__toggle">
                                        <a href="#">
                                            <h3><?php the_sub_field('location_name'); ?></h3>
                                            <i class="fa-solid fa-angle-down"></i>
                                        </a>

                                        <div class="accordion-content">
                                            <div class="location-image">
                                                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                                            </div>
                                            <div class="location-address">
                                                <h3><?php the_sub_field('address_title'); ?></h3>
                                                    <?php if( have_rows('address_description') ): ?>
                                                        <?php while( have_rows('address_description') ): the_row(); 
                                                            ?>
                                                                <p><?php the_sub_field('address'); ?></p>
                                                                <p><?php the_sub_field('code'); ?></p>
                                                                <a href="" class="btn btn-primary">
                                                                    Get Directions <i class="fa-solid fa-arrow-right"></i>
                                                                </a>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                            </div>
                                            <div class="location-contact">
                                                <?php if( have_rows('contact&hours') ): ?>
                                                        <?php while( have_rows('contact&hours') ): the_row(); 
                                                            ?>
                                                                <div>
                                                                    <h3><?php the_sub_field('phone'); ?></h3>
                                                                    <p><?php the_sub_field('number'); ?></p>
                                                                </div>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                            </div>

                                             <div class="location-time">
                                                <?php if( have_rows('office_hours') ): ?>
                                                        <?php while( have_rows('office_hours') ): the_row(); 
                                                            ?>
                                                                <div>
                                                                    <h3><?php the_sub_field('phone'); ?></h3>
                                                                    <p><?php the_sub_field('number'); ?></p>
                                                                    <p><?php the_sub_field('time'); ?></p>
                                                                </div>
                                                        <?php endwhile; ?>
                                                    <?php endif; ?>
                                            </div>
                                                <div class="book-button">
                                                    <a href="" class="btn book">
                                                        BOOK NOW <i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>  
   </section>