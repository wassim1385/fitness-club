<?php
    get_header('front');
        while(have_posts()) : the_post(); ?>
        <section class="welcome section text-center">
            <h2 class="text-primary"><?php the_field('welcome_heading'); ?></h2>
            <p><?php the_field('welcome_text'); ?></p>
        </section>
        <section class="section-areas">
            <ul class="areas-container">
                <li class="area">
                    <?php
                        $area1 = get_field('area_1');
                        $image = wp_get_attachment_image_src($area1['area_image'], 'medimuSize')[0];
                    ?>
                    <img src="<?php echo $image; ?>">
                    <p><?php echo $area1['area_name']; ?></p>
                </li>
                <li class="area">
                    <?php
                        $area2 = get_field('area_2');
                        $image = wp_get_attachment_image_src($area2['area_image'], 'medimuSize')[0];
                    ?>
                    <img src="<?php echo $image; ?>">
                    <p><?php echo $area2['area_name']; ?></p>
                </li>
                <li class="area">
                    <?php
                        $area3 = get_field('area_3');
                        $image = wp_get_attachment_image_src($area3['area_image'], 'medimuSize')[0];
                    ?>
                    <img src="<?php echo $image; ?>">
                    <p><?php echo $area3['area_name']; ?></p>
                </li>
                <li class="area">
                    <?php
                        $area4 = get_field('area_4');
                        $image = wp_get_attachment_image_src($area4['area_image'], 'medimuSize')[0];
                    ?>
                    <img src="<?php echo $image; ?>">
                    <p><?php echo $area4['area_name']; ?></p>
                </li>
            </ul>
        </section>
        <section class="classes-homepage">
            <div class="container section">
                <h2 class="text-primary text-center">Our Classes</h2>
                <?php med_fitness_classes_list(4); ?>
                <div class="button-container">
                    <a class="button" href="<?php echo get_permalink(get_page_by_title('Classes')); ?>">View all classes</a>
                </div>
            </div>
        </section>
        <section class="instructors">
            <div class="container section">
                <h2 class="text-center">Our instructors</h2>
                <p class="text-center">Professional instructors that will help you achieve your goals!</p>
                <?php medfitness_instructors_list(); ?>
            </div>
        </section>
        <section class="blog container section">
            <h2 class="text-center">From Our Blog</h2>
            <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 4
                );
                $blog  = new WP_Query($args); ?>
                <ul class="blog-entries">
                    <?php while($blog->have_posts()) : $blog->the_post(); ?>
                    <?php echo get_template_part( 'template-parts/blog', 'loop' ); ?>
                    <?php endwhile; wp_reset_postdata(); ?>  
                </ul>
        </section>
    <?php endwhile; wp_reset_postdata();
    get_footer();
?>