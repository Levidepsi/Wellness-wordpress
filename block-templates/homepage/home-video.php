<section class="home-video-wrapper">
            <div class="container">
            <?php if( have_rows('home_video') ): ?>
                <?php while( have_rows('home_video') ): the_row(); 
                    $image = get_sub_field('video');
                    ?>
                <div class="home-video-box">
                        <a href="https://youtu.be/NiSPfBjvE3s">
                            <div class="video-box">
                                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                                <div class="video-overlay">
                                    <div class="video-play"><i class="fa-solid fa-circle-play"></i></div>
                                </div>
                            </div>
                        </a>

                    <div class="home-customer-item">
                        <h5> <?php the_sub_field('content') ?></h5>
                        <h2><?php the_sub_field('title') ?></h2>
                        <p><?php the_sub_field('description') ?> </p>

                        <div class="button-wrapper">
                            <?php 
                            $link = get_sub_field('watch_video');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                <?php echo esc_html( $link_title ); ?><i class="fa-solid fa-arrow-right"></i>
                            </a>
                            <?php endif; ?>
                       
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
</section>
