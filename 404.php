<?php theme_include('header'); ?>

	<main class="content" role="main" id="error-page">

	    <article>

	        <header>
	        <h1>Page not found</h1>
	        </header>

	        <section class="post-content">
	           <p>Unfortunately, the page <code>/<?php echo current_url(); ?></code> could not be found. Your best bet is either to try the <a href="<?php echo base_url(); ?>">homepage</a> or go and cry in a corner (although I don’t recommend the latter).</p>
	        </section>

	    </article>

	</main>

<?php theme_include('footer'); ?>