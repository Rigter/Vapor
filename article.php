<link rel="stylesheet" href="/path/to/styles/default.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/highlight.min.js"></script>
<script>
hljs.initHighlightingOnLoad();
</script>
<?php theme_include('header'); ?>
<!-- <?php echo rss_url(); ?> -->
    <main class="content" role="main" id="article-<?php echo article_id(); ?>">

        <article class="<?=(article_css())?article_css():''?>">

            <header>
            <div class="post-meta tags">Posted in <?php echo article_category(); ?></div>
            <h1 class="post-title"><?php echo article_title(); ?></h1>
            <div class="post-meta"><time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time></div>
            </header>
            <section class="post-content">
                <?php echo article_markdown();?>
            </section>

            <section class="share">
                <p class="info prompt">Share this post</p>
                <a href="http://twitter.com/share?text=<?php echo article_title(); ?>&url=<?php echo full_url(current_url()); ?>"
                    onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
                    <i class="fa fa-2x fa-fw fa-twitter"></i> <span class="hidden">Twitter</span>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo full_url(current_url()); ?>"
                    onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
                    <i class="fa fa-2x fa-fw fa-facebook-square"></i> <span class="hidden">Facebook</span>
                </a>
                <a href="https://plus.google.com/share?url=<?php echo full_url(current_url()); ?>"
                   onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;">
                    <i class="fa fa-2x fa-fw fa-google-plus-square"></i> <span class="hidden">Google+</span>
                </a>
                <!-- <?php echo full_url(current_url()); echo "-----"; echo article_url(); ?> -->
            </section>

            <footer class="post-footer">
                <section class="author">
                    <div class="authorimage" style="background: url(<?php echo vapor_header_image_url(); ?>)"></div>
                    <p class="attr">Author</p>
                    <h4><a href="<?php echo base_url(); ?>"><?php echo article_author(); ?></a></h4>
                    <p class="bio"><?php echo article_author_bio(); ?></p>
                </section>
            </footer>
            <?php if(comments_open()): ?>
                <hr />

        <section class="comments">

            <?php if(has_comments()): ?>
                                    <h1>Comments</h1>

            <ul class="commentlist">
                <?php $i = 0; while(comments()): $i++; ?>
                <li class="comment" id="comment-<?php echo comment_id(); ?>">
                    <div class="wrap">
                        <h2><?php echo comment_name(); ?></h2>
                        <time><?php echo relative_time(comment_time()); ?></time>

                        <div class="content">
                            <?php $Parsedown = new ParseDown(); ?>
                            <?php echo $Parsedown->text(html_entity_decode(comment_text())); ?>
                        </div>

                        <span class="counter"><?php echo $i; ?></span>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else: ?>
                <h1>Be the first one to leave a comment!</h1>
            <?php endif; ?>

            <form id="comment" class="commentform wrap" method="post" action="<?php echo comment_form_url(); ?>#comment">
                <?php echo comment_form_notifications(); ?>

                <p class="name">
                    <label for="name">Your name:</label>
                    <?php echo comment_form_input_name('placeholder="Your name"'); ?>
                </p>

                <p class="email">
                    <label for="email">Your email address:</label>
                    <?php echo comment_form_input_email('placeholder="Your email (won’t be published)"'); ?>
                </p>

                <p class="textarea">
                    <label for="text">Your comment:</label>
                    <?php echo comment_form_input_text('placeholder="Your comment"'); ?>
                </p>

                <p class="submit">
                    <?php echo comment_form_button(); ?>
                </p>
            </form>

        </section>
        <?php endif; ?>
        </article>

    </main>


<?php theme_include('footer'); ?>