<!-- TEMPLATE FOR A POST LIST -->

<?php get_template_part('templates/header'); ?>

<section class="content--wrapper">
    <main class="content" role="main">
        <?php while(have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> role="article">
            <header class="content__header post__header">
                <h1 class="content__title post__title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h1>
                <aside class="byline vcard">
                    <time class="byline__date updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                        <?php the_time(get_option('date_format')); ?>
                    </time>
                    by
                    <span class="byline__author"><?php the_author_posts_link(); ?></span>
                </aside>
            </header>
            <section class="post__content">
                <?php if ( has_post_thumbnail() ) : ?>
                <figure class="content__thumbnail post__thumbnail">
                    <?php the_post_thumbnail(); ?>
                </figure>
                <?php endif; ?>
                <div class="content--inner post__content--inner">
                    <?php the_content(); ?>
                </div>
            </section>
            <footer class="post__metadata">
                <section class="post__categories">
                    Categories: <?php the_category(', '); ?>
                </section>
                <section class="post__tags">
                    <?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?>
                </section>
            </footer>
            <hr />
        </article>
        <?php endwhile; ?>
        <nav class="prev-next-nav">
            <div class="prev-link">
                <?php echo get_next_posts_link('&laquo; Older Entries') ?>
            </div>
            <div class="next-link">
                <?php echo previous_posts_link('Newer Entries &raquo;') ?>
            </div>
        </nav>
    </main>
    <?php get_template_part('templates/sidebar'); ?>
</section>

<?php get_template_part('templates/footer'); ?>