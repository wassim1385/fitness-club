<?php
    function med_fitness_classes_list($number = -1) { ?>
        <ul class="classes-list">
            <?php
                $args = array(
                    'post_type' => 'gymfitness_classes',
                    'posts_per_page' => $number
                );
                $classes = new WP_Query($args);

                // Use WP_Query and append the result into $classes
                while ($classes->have_posts()) : $classes->the_post();
                ?>
                <li class="gym-class card gradient">
                    <?php the_post_thumbnail('mediumSize'); ?>
                    <div class="card-content">
                        <a href="<?php the_permalink(); ?>">
                            <h3><?php the_title(); ?></h3>
                        </a>
                        <?php $start_time  = get_field('start_time');
                              $end_time = get_field('end_time');
                        ?>
                        <p><?php echo get_field('class_days') . ' - ' . $start_time . ' to ' . $end_time; ?></p>
                    </div>
                </li>
                <?php endwhile; wp_reset_postdata(); ?>
        </ul>
<?php }

//Display the instructors
function medfitness_instructors_list() { ?>
    <ul class="instructors-list">
        <?php
            $args = array(
                'post_type' => 'instructors',
                'posts_per_page' => -1
            );
            $instructors = new WP_Query($args);
            while($instructors->have_posts()) : $instructors->the_post(); ?>
            <li class="instructor">
                <?php the_post_thumbnail('mediumSize'); ?>
                <div class="content text-center">
                    <h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <div class="specilty">
                        <?php
                            $specilaty = get_field('specialty');
                            foreach($specilaty as $s) : ?>
                                <span class="tag"><?php echo $s; ?></span>
                            <?php endforeach; ?>
                    </div>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata();
        ?>
    </ul>

<?php } ?>