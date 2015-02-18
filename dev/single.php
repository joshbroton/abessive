<!-- TEMPLATE FOR A SINGLE POST -->

<?php get_template_part('templates/header'); ?>

<section class="content_wrapper">
    <main class="content" role="main">
        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                <header class="post--header">
                    <h1 class="post--title" title="<?php the_title_attribute(); ?>" itemprop="headline">
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
                        <figure class="post--thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </figure>
                    <?php endif; ?>
                    <div class="post--content_inner">
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
                <section class="comments">
                    <?php comments_template( '/comments.php' ); ?>
                </section>
            </article>
            <?php if(is_paged()) : ?>
            <hr />
            <nav class="paginated-posts">
                <?php wp_link_pages(); ?>
            </nav>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php else : ?>
        <article class="post_404">
            header class="post--header">
            <h1 class="post--title">
                Oops! Post not found.
            </h1>
            </header>
            <section class="post--content">
                Something has gone very, very, VERY wrong. Can you make sure you clicked on the right thing?
            </section>
            <footer class="post--metadata">
                You've gotten this error message from the index.php file in the template.
            </footer>
        </article>
        <?php endif; ?>
    </main>
</section>

<?php get_template_part('templates/footer'); ?>