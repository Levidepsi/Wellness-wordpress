<section class="home-rating">
            <div class="curved-blue">
              <?php 
                $image = get_field('curve');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if( $image ) {
                    echo wp_get_attachment_image( $image, $size );
                }
              ?>
            </div>
            <div class="container">
                <div class="rating-list">
                    <div class="row">
                            <?php if( have_rows('rating') ): ?>
                                <?php while( have_rows('rating') ): the_row(); 
                                    ?>
                                    <div class="flex col-sm-4 col-md-4">
                                        <div class="rate-content">
                                        <h2><?php the_sub_field('statistics'); ?></h2>
                                        <h5><?php the_sub_field('label'); ?></h5>
                                        </div>      
                                    </div>          
                                <?php endwhile; ?>
                            <?php endif; ?>
                    </div>
                </div>
            </div>
</section>