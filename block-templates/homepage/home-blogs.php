<section class="blogs">
            <div class="select">
                  <h2>BLOG</h2>
            <?php if( have_rows('options') ): ?>
                <?php while( have_rows('options') ): the_row(); 
                    $image = get_sub_field('image');
                    ?>
                <!-- <label>Select Category</label> -->
                        <div class="desktop-category">
                            <ul>
                                <li>
                                    <a href="">
                                            <?php the_sub_field('lists') ?>
                                    </a>
                                </li>
                            </ul>
                        </div>                   
                <?php endwhile; ?>
            <?php endif; ?>
            </div>

            <div class="tab-contents">
                <div class="container">
                        <div class="blog-contents row">
                        <?php if( have_rows('blog_card') ): ?>
                            <?php while( have_rows('blog_card') ): the_row(); 
                                $image = get_sub_field('blog_image');
                                ?>
                        <div class="col-sm-4 col-md-4">
                                <a href="">
                                    <div class="blog-card">
                                        <div class="blog-image">
                                        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                                        </div>
                                        <div class="blog-content">
                                            <h3><?php the_sub_field('blog_content'); ?></h3>
                                            <p><?php the_sub_field('description'); ?></p>
                                            <?php 
                                            $link = get_field('link');
                                            if( $link ): 
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self';
                                                ?>
                                                <a  class="hyperlink"href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?>
                                                <i class="fa-solid fa-angle-right"></i></span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>                           
                            <?php endwhile; ?>
                        <?php endif; ?>                        
                        </div>
                </div>
            </div>

            <div class="blog-button">
                <a class="btn btn-primary"> Visit Our Blog</a>
            </div>
  </section>


   <!-- <select name="categories" aria-placeholder="Select Category">
                    <option value="">Select Category</option>
                    <option value="">WEIGHT LOSS</option>
                    <option value="">BODY SHAPING</option>
                    <option value="">HORMONES</option>
                    <option value="">MEDICAL AESTHETICS</option>
                    <option value="">RECOVERY</option>
                    <option value="">EVENT AND SPECIALS</option>
  </select> -->