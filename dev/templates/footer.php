    <footer class="body__footer" role="contentinfo">
        <section class="footer__copyright">
            This is the <a href="http://github.com/joshbroton/abessive">Abessive Theme Boilerplate</a> and is licensed under the GPLv2 or later.
        </section>
        <?php if (has_nav_menu('footer_navigation')) : ?>
        <nav class="secondary-nav" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'secondary-nav__menu')); ?>
        </nav>
        <?php endif; ?>
    </footer>
    <?php wp_footer(); ?>
</div> <!-- .wrapper -->
<script src="http://localhost:35729/livereload.js?snipver=1"></script>
</body>
</html>