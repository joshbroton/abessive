<!-- TEMPLATE FOR THE SIDEBAR -->

<section id="mainSidebar" class="sidebar content__sidebar" role="complimentary">
    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'main-sidebar' ); ?>
    <?php else : ?>
        <section class="widget warning">
            Please activate some sidebar widgets or deactivate the sidebar.
        </section>
    <?php endif; ?>
</section>