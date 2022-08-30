<footer>
        <div class="container">
            <div class="row footer-top">
                <div class="col-sm-6 col-md-6 footer-left-content">
                    <div class="footer-right">
                        <div class="footer-logo">
                            <a href="#"> 
                            <h2>
                                    <span class="synergy-text"><?php the_field('synergy', 'option') ?></span> | <span><?php the_field('wellness', 'option') ?></span>
                                </h2> 
                            </a>
                        </div>
                        <div class="footer-mobile-section">
                            <h5><?php the_field('subscribe', 'option') ?></h5>
                            <p><?php the_field('signup', 'option') ?></p>
                            <form action="">
                                <div class="contact-form">
                                    <div class="footer-email">
                                        <input type="text" id="email" placeholder="Email Address" name>
                                        <div class="form-submit">
                                            <label for="email"><i class="fa-solid fa-arrow-right"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="footer-top-right">
                            <div class="social-icon">
                                <a href=""><?php the_field('icons', 'option') ?></a>
                                <a href=""><?php the_field('twitter', 'option') ?></a>
                                <a href=""><?php the_field('linkedin', 'option') ?></a>
                                <a href=""><?php the_field('instagram', 'option') ?></a>

                            </div>
                        </div>
                        <div class="image-cert">
                        <?php 
                            $image = get_field('imgone', 'option');
                            $size = 'full attachment-full size-full entered lazyloaded imgone'; // (thumbnail, medium, large, full or custom size)
                            if( $image ) {
                                echo wp_get_attachment_image( $image, $size );
                            }
                        ?>   
                         <?php 
                            $image = get_field('imgtwo', 'option');
                            $size = 'full attachment-full size-full entered lazyloaded imgtwo'; // (thumbnail, medium, large, full or custom size)
                            if( $image ) {
                                echo wp_get_attachment_image( $image, $size );
                            }
                        ?>                  
                        </div>
                    </div>

                    <div class="footer-site-information">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="contact-left">
                                    <li class="address">
                                        <h5> <i class="fa-solid fa-location-dot"></i><?php the_field('location_icon', 'option') ?></h5>
                                        <p><?php the_field('street', 'option') ?></p>
                                        <a href=""><?php the_field('map', 'option') ?></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <ul class="contact-info">
                                    <li>
                                        <span class="icon-phone"><i class="phone fa-solid fa-phone-volume"></i></span>
                                        <a href=""><p><?php the_field('number', 'option') ?></p></a>
                                    </li>

                                    <li>
                                        <span class="icon-fax"><i class="fa-solid fa-fax"></i></span>
                                        <a href=""><p><?php the_field('fax', 'option') ?></p></a>
                                    </li>

                                    <li>
                                        <span class="icon-hours"><i class="fa-solid fa-clock-nine"></i></span>
                                        <p><?php the_field('time', 'option') ?></p>
                                    </li>
                                </ul>
                            </div>

                            <div class=" footer-right-content-col">
                                <div class="quick-menu">
                                    <h6>QUICK LINKS</h6>
                                </div>
                                <nav class="footer-navigation">
                                    <ul class="menu">
                                        <li>
                                            <a href=""><?php the_field('recovery', 'option') ?></a>
                                        </li>
                                        <li>
                                            <a href=""><?php the_field('about_us', 'option') ?></a>
                                        </li>
                                        <li>
                                            <a href=""><?php the_field('contact_us', 'option') ?></a>
                                        </li>
                                        <li>
                                            <a href=""><?php the_field('wellness', 'option') ?></a>
                                        </li>
                                        <li>
                                            <a href=""><?php the_field('location', 'option') ?></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="copyright">
                            <ul class="clearfix">
                                <li><a href=""><?php the_field('site', 'option') ?> |</a></li>
                                <li><a href=""><?php the_field('privacy', 'option') ?> |</a></li>
                                <li><?php the_field('copyright', 'option') ?></li>
                                <li><?php the_field('register', 'option') ?></li>
                            </ul>
                        </div>
                    </div>
                    <a href="" class="back-to-top"><?php the_field('back_to_top', 'option') ?></a>
                </div>
            </div>
        </div>
    </footer>
		
        <!-- Back To Top Icon area
        <button class="back-to-top js-back-to-top" type="button">
            <span class="back-to-top__label">Back to top</span>
            <i class="icon-arrow-up"></i>
        </button>
        -->

        

        <?php wp_footer(); ?>
    </body>
</html>
