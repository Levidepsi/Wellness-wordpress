<section class="home-testimonial">
            <div class="container">
                <h5>OUR TESTIMONIALS</h5>
                <h2>WHAT OUR PATIENTS SAY</h2>
                <div class="row">
                    <div class="columns col-md-12">

                            <?php if( have_rows('testimonials') ): ?>
                                    <?php while( have_rows('testimonials') ): the_row(); 
                                        $image = get_sub_field('avatar');
                                        ?>
                                        <div class="testimonial ">
                                            <div class="home-testimonial-box">
                                            <p><?php the_sub_field('testimony'); ?></p>
                                            
                                            <div class="client-info">
                                                <div class="client-image">
                                                <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                                                </div>
                                                <div class="client-name">
                                                <h4><?php the_sub_field('name'); ?></h4>
                                                    <div class="stars">
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                        <span><i class="fa fa-star"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                            <?php endif; ?>
                    </div>        
                </div>
</section>
