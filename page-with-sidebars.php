<?php
/*
*Template Name: Page with sidebar
*/
get_header(); ?>
    <main class="container page section with-sidebar">
        <div class="page-content">
            <?php get_template_part( 'template-parts/page', 'loop'); ?>
            <?php if (is_page('classes')):
                med_fitness_classes_list();
            endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </main>
<?php get_footer(); ?>