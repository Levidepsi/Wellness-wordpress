<?php get_header() ?>


<?php if( have_rows('guests') ): ?>
    <ul class="slides">
    <?php while( have_rows('guests') ): the_row(); 
        $avatar = get_sub_field('avatar');
        ?>
        <li>
            <?php echo wp_get_attachment_image( $avatar, 'full' ); ?>
            <p><?php the_sub_field('name'); ?></p>
            <p><?php the_sub_field('age'); ?></p>
            <p><?php the_sub_field('description'); ?></p>
        </li>
    <?php endwhile; ?>
    </ul>
<?php endif; ?>

<?php get_footer() ?>