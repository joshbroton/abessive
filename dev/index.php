<!-- TEMPLATE FOR A POST LIST -->

<?php get_template_part('templates/header'); ?>

<section class="content_wrapper">
    <main class="content" role="main">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> role="article">
            <header class="content--header post--header">
                <h1 class="content--title post--title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h1>
                <aside class="byline vcard">
                    <time class="byline--date updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                        <?php the_time(get_option('date_format')); ?>
                    </time>
                    by
                    <span class="byline--author"><?php the_author_posts_link(); ?></span>
                </aside>
            </header>
            <section class="post--content">
                <?php if ( has_post_thumbnail() ) : ?>
                <figure class="content--thumbnail post--thumbnail">
                    <?php the_post_thumbnail(); ?>
                </figure>
                <?php endif; ?>
                <div class="content_inner post--content_inner">
                    <?php the_content(); ?>
                </div>
            </section>
            <footer class="post--metadata">
                <section class="post--categories">
                    Categories: <?php the_category(', '); ?>
                </section>
                <section class="post--tags">
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
        <?php else : ?>
        <article class="post post_404">
            <header class="content--header post--header">
                <h1 class="content--title post--title">
                    Oops! Post not found.
                </h1>
            </header>
            <section class="post--content">
                <div class="content_inner page--content_inner">
                    Something has gone very, very, VERY wrong. Can you make sure you clicked on the right thing?
                </div>
            </section>
            <footer class="post--metadata">
                You've gotten this error message from the index.php file in the template.
            </footer>
        </article>
        <?php endif; ?>
    </main>
    <?php get_template_part('templates/sidebar'); ?>
</section>

<?php get_footer(); ?>