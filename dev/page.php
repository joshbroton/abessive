<!-- TEMPLATE FOR A SINGLE PAGE -->

<?php get_template_part('templates/header'); ?>

<section class="content--wrapper">
    <main class="content" role="main">
        <?php while(have_posts()) : the_post(); ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class('page'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                <header class="content__header page__header">
                    <h1 class="content__title page__title" title="<?php the_title_attribute(); ?>" itemprop="headline">
                        <?php the_title(); ?>
                    </h1>
                </header>
                <section class="page__content"  itemprop="articleBody">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <figure class="post__thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </figure>
                    <?php endif; ?>
                    <div class="content--inner page__content--inner">
                        <?php the_content(); ?>
                    </div>
                </section>
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() && get_comments_number() != 0 ) : ?>
                    <section class="comments page__comments">
                        <?php comments_template(); ?>
                    </section>
                <?php endif; ?>
            </article>
            <?php if(is_paged()) : ?>
                <hr />
                <nav class="paginated-posts">
                    <?php wp_link_pages(); ?>
                </nav>
            <?php endif; ?>
        <?php endwhile; ?>
    </main>
    <?php get_template_part('templates/sidebar'); ?>
</section>

<?php get_template_part('templates/footer'); ?>