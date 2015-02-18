    <footer class="body--footer" role="contentinfo">
        <section class="footer--copyright">
            This is the <a href="http://github.com/joshbroton/abessive">Abessive Theme Boilerplate</a> and is licensed under the GPLv2 or later.
        </section>
        <nav class="secondary-nav" role="navigation">
            <?php
            if (has_nav_menu('footer_navigation')) :
                wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'secondary-nav--menu'));
            endif;
            ?>
        </nav>
    </footer>
    <?php wp_footer(); ?>
</div> <!-- .wrapper -->
</body>
</html>