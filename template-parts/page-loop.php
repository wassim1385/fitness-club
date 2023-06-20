<?php while (have_posts()) : the_post(); ?>
    <h1 class="text-center text-primary"><?php the_title(); ?></h1>
    <?php
        if(has_post_thumbnail()) :
        the_post_thumbnail('post', array('class' => 'featured-image'));
        endif;

        // Check the post type
        if(get_post_type() === 'gymfitness_classes') :
            $start_time  = get_field('start_time');
            $end_time = get_field('end_time'); ?>
            <p class="content-class">
                <?php echo get_field('class_days') . ' - ' . $start_time . ' to ' . $end_time; ?>
            </p>
        <?php endif; ?>
    <p><?php the_content(); ?></p>

<?php endwhile; ?>