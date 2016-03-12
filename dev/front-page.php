<!-- TEMPLATE FOR THE FRONT PAGE -->

<?php get_template_part('templates/header'); ?>

<section class="content--wrapper">
    <main class="content" role="main">
        <?php while(have_posts()) : the_post(); ?>

        <?php endwhile; ?>
    </main>
</section>

<?php get_template_part('templates/footer'); ?>