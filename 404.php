<?php get_header(); ?>

<?php get_template_part('partials/masthead'); ?>

<div class="container">

    <!-- Use https://blendedwaxes.com/404 as an example -->

    <!-- Add image buttons below for top ~4 pages - one should be the homepage, PM to specify the others in specs -->
    <section class="imgbtns-404">
        <div class="row">
            <h2>Explore one of these pages instead:</h2>
            <div class="col-xxs-12 col-sm-6 col-md-4">
                <!-- image button -->
            </div>
            <div class="col-xxs-12 col-sm-6 col-md-4">
                <!-- image button -->
            </div>
            <div class="col-xxs-12 col-sm-6 col-md-4">
                <!-- image button -->
            </div>
            <div class="col-xxs-12 col-sm-6 col-md-4">
                <!-- image button -->
            </div>
        </div>
    </section>

    <section class="links-404">
        <div class="row">
            <div class="col-xxs-12 col-md-6">
                <div class="search-404">
                    <h4>Or, try searching our site:</h4>
                    <?php get_search_form(); ?>
                </div>
            </div>
            <div class="col-xxs-12 col-md-6">
                <div class="contact-404">
                    <h4>Still can't find what you're looking for?</h4>
                    <a href="#" class="btn">Contact Us Today!</a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); 