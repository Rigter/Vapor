<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="viewport" content="width=device-width">
    <meta name="generator" content="Anchor CMS">
    <meta name="description" content="<?php echo site_description(); ?>">
    <title><?php echo page_title('Page can’t be found'); ?> - <?php echo site_name(); ?></title>
    <?php vapor_metatags(); ?>
    <link rel="stylesheet" href="<?php echo full_url(theme_url('/assets/css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo full_url(theme_url('/assets/css/screen.css')); ?>">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
    <link rel="shortcut icon" href="<?php echo full_url(theme_url('/assets/img/favicon.png')); ?>">
    <?php if(customised()): ?>
    <!-- Custom CSS -->
    <style><?php echo article_css(); ?></style>
    <!--  Custom Javascript -->
    <script><?php echo article_js(); ?></script>
    <?php endif; ?>
</head>
<body class="<?php echo body_class(); ?>">
    
    <?php vapor_google_analytics() ?>

    <header id="site-head">
        <a id="blog-logo" href="<?php echo full_url(); ?>"><div class="bloglogo" style="background: url(<?php echo vapor_header_image_url(); ?>)"></div></a>
        <h1 class="blog-title"><a href="<?php echo full_url(); ?>"><?php echo site_name(); ?></a></h1>
        <h2 class="blog-description"><?php echo site_description(); ?></h2>

        <?php if(has_menu_items()): ?>
        <nav class="menu" role="nav">
            <ul><?php while(menu_items()): ?><li<?php echo (menu_active() ? ' class="active"' : ''); ?>><a href="<?php echo menu_url(); ?>" title="<?php echo menu_title(); ?>"><?php echo menu_name(); ?></a></li><?php endwhile; ?></ul>
        </nav>
    <?php endif; ?>
    </header>
    