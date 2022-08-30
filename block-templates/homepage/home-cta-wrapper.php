<section class="home-cta-wrapper">
            <div class="home-cta-background">
            <?php 
            $image = get_field('home_cta_image');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $image ) {
                echo wp_get_attachment_image( $image, $size );
            }
            ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-cta-content">
                            <h2>READY TO GET STARTED</h2>
                            <p>Get in touch with us today with any questions you may have, to book an appointment or view
                                our growing wellness store</p>
                            <div href="#" class="btn-bended-wrapper">
                                <a href="" class="btn btn-primary">
                                    Contact Us <i class="fa-solid fa-arrow-right"></i>
                                </a>

                                <a href="" class="btn btn-secondary">
                                    Shop Now <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>