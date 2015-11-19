<?php theme_include('header'); ?>

	<main class="content" role="main" id="page-<?php echo page_id(); ?>">

	    <article>

	        <header>
	        <h1 class="post-title"><?php echo page_title(); ?></h1>
	        </header>

	        <section class="post-content">
	            <?php echo page_content(); ?>
	        </section>

	    </article>

	</main>


<?php theme_include('footer'); ?>