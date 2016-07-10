<?php theme_include('header'); ?>

    <main class="content" role="main" id="article-<?php echo article_id(); ?>">

        <article class="<?=(article_css())?article_css():''?>">

            <header>
            <div class="post-meta tags">Posted in <?php echo category_title(); ?></div>
            <h1 class="post-title"><?php echo article_title(); ?></h1>
            <div class="post-meta"><time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time></div>
            </header>

            <section class="post-content">
                <?php echo article_markdown(); ?>
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
            
        </article>

    </main>


<?php theme_include('footer'); ?>