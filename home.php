<?php
    get_header(); ?>
    <main class="container page section">
        <ul class="blog-entries">
            <?php while (have_posts()) : the_post(); ?>
                <?php echo get_template_part( 'template-parts/blog', 'loop' ); ?>
    
                <?php endwhile; ?>
        </ul>
    </main>
<?php
    get_footer();
?>