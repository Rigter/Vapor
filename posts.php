<?php theme_include('header'); ?>

    <main class="content" role="main">

    	<?php if(has_posts()): while(posts()): ?>
          <article class="preview">
              <header>
                  <h1 class="post-title"><a href="<?php echo full_url(article_url()); ?>"><?php echo article_title(); ?></a></h1>
                  <div class="post-meta"><time datetime="<?php echo date(DATE_W3C, article_time()); ?>"><?php echo relative_time(article_time()); ?></time></div>
              </header>
              <section class="post-excerpt">
                  <?php echo article_markdown(); ?>
                  <p class="readmore"><a href="<?php echo full_url(article_url()); ?>">Read this article <i class="fa fa-chevron-circle-right"></i></a></p>
              </section>
          </article>
        <?php endwhile; ?>

        <?php if(has_pagination()): ?>
            <nav class="pagination" role="pagination">
                <?php echo vapor_posts_next(); ?>
                <?php echo vapor_current_page(); ?>
                <?php echo vapor_posts_prev(); ?>
            </nav>
        <?php endif; ?>

        <?php else: ?>
            <header>
                <h1 class="post-title">404</h1>
            </header>
            <article class="preview">
              <section class="post-excerpt">
                <p class="post-meta">Looks like you have some writing to do!</p>
              </section>
            </article>
        <?php endif; ?>

    </main>

<?php theme_include('footer'); ?>