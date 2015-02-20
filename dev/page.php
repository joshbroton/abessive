<!-- TEMPLATE FOR A SINGLE PAGE -->

<?php get_template_part('templates/header'); ?>

<section class="content_wrapper">
    <main class="content" role="main">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class('page'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                <header class="content--header page--header">
                    <h1 class="content--title page--title" title="<?php the_title_attribute(); ?>" itemprop="headline">
                        <?php the_title(); ?>
                    </h1>
                </header>
                <section class="page--content clearfix"  itemprop="articleBody">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <figure class="post--thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </figure>
                    <?php endif; ?>
                    <div class="content_inner page--content_inner">
                        <?php the_content(); ?>
                    </div>
                </section>
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() && get_comments_number() != 0 ) : ?>
                    <section class="comments page--comments">
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
        <?php else : ?>
        <article class="page page_404">
            <header class="content--header page--header">
                <h1 class="content--title page--title">
                    Oops! Post not found.
                </h1>
            </header>
            <section class="page--content">
                <div class="content_inner page--content_inner">
                    Something has gone very, very, VERY wrong. Can you make sure you clicked on the right thing?
                </div>
            </section>
        </article>
        <?php endif; ?>
    </main>
    <?php get_template_part('templates/sidebar'); ?>
</section>

<?php get_template_part('templates/footer'); ?>