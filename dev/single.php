<!-- TEMPLATE FOR A SINGLE POST -->

<?php get_template_part('templates/header'); ?>

<section class="content_wrapper">
    <main class="content" role="main">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                <header class="content--header post--header">
                    <h1 class="content--title post--title" title="<?php the_title_attribute(); ?>" itemprop="headline">
                        <?php the_title(); ?>
                    </h1>
                    <aside class="byline vcard">
                        <time class="byline--date updated" datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
                            <?php the_time(get_option('date_format')); ?>
                        </time>
                        by
                        <span class="byline--author"><?php the_author_posts_link(); ?></span>
                    </aside>
                </header>
                <section class="post--content clearfix"  itemprop="articleBody">
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
                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() && get_comments_number() != 0 ) : ?>
                    <section class="comments post--comments">
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
        </article>
        <?php endif; ?>
    </main>
    <?php get_template_part('templates/sidebar'); ?>
</section>

<?php get_template_part('templates/footer'); ?>