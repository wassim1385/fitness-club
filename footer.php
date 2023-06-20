    <footer class="site-footer container">
        <div class="footer-content">
            <?php
                $args = array(
                    'theme-location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'footer-menu'
                );
                wp_nav_menu($args);
            ?>
            <p class="copyright">All rights reserved. <?php echo get_bloginfo('name') . ' ' . date('Y'); ?>
        </div>
        <div class="site-designer text-center">
            <p>Designed by <a href="https://www.linkedin.com/in/wassim-jelleli/" target="_blank">Wassim</a></p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>