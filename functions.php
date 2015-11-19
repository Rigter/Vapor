<?php

function relative_time($date) {
	if(is_numeric($date)) $date = '@' . $date;

	$user_timezone = new DateTimeZone(Config::app('timezone'));
	$date = new DateTime($date, $user_timezone);

	// get current date in user timezone
	$now = new DateTime('now', $user_timezone);

	$elapsed = $now->format('U') - $date->format('U');

	if($elapsed <= 1) {
		return 'Just now';
	}

	$times = array(
		31104000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
	);

	foreach($times as $seconds => $title) {
		$rounded = $elapsed / $seconds;

		if($rounded > 1) {
			$rounded = round($rounded);
			return $rounded . ' ' . pluralise($rounded, $title) . ' ago';
		}
	}
}

function pluralise($amount, $str, $alt = '') {
	return intval($amount) === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

function vapor_metatags() {
	vapor_facebook_og();
	vapor_facebook_og_image();
	vapor_twitter_card();
}

function vapor_facebook_og() {

	if(article_id()){
	echo '<meta property="og:site_name" content="'.site_name().'" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="'.article_title().'" />
	<meta property="og:description" content="'.article_description().'" />
	<meta property="og:url" content="'.e(current_url()).'" />
	<meta property="article:tag" content="'.category_title().'" />';
	}else{
	echo '<meta property="og:site_name" content="'.site_name().'" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="'.site_name().'" />
	<meta property="og:description" content="'.site_description().'" />
	<meta property="og:url" content="'.full_url().'" />';
	}
}

function vapor_facebook_og_image(){
	$fog = site_meta('facebook_og_image');
	
	if($fog!='' || $fog!=NULL){
		$url = $fog;
	}else{
		$url = full_url(theme_url('/assets/img/og_image.gif'));
	}

	echo '
	<meta property="og:image" content="'.$url.'" />
	';
}

function vapor_twitter_card() {

	$twitter = site_meta('twitter_account');

	if($twitter!='' || $twitter!=NULL){

		$title = (article_id())?article_title():site_name();
		$description = (article_id())?article_description():site_description();

	echo '<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@'.str_replace('@','',$twitter).'" />
	<meta name="twitter:title" content="'.$title.'" />
	<meta name="twitter:description" content="'.$description.'" />';

	}
}

function vapor_google_analytics() {
	
	$ga = site_meta('google_analytics');
	
	if($ga!='' || $ga!=NULL){
		echo site_meta('google_analytics');
	}
}

function vapor_header_image_url(){
	$header = site_meta('header_image');
	
	if($header!='' || $header!=NULL){
		return full_url(site_meta('header_image'));
	}else{
		return full_url(theme_url('/assets/img/vapor_logo.png'));
	}
}

function vapor_current_page() {
	$per_page = Config::meta('posts_per_page');
	$page = Registry::get('page_offset');
	$offset = ($page - 1) * $per_page;
	$total = Registry::get('total_posts');
	$pages = floor($total / $per_page);
	return '<span class="page-number">Page '.$page.' of '.$pages.'</span>';
}

// Credits to Tovic (http://forums.anchorcms.com/profile/tovic)
// Source: http://forums.anchorcms.com/requests/pagination-should-be-customizable#post-3117
function vapor_posts_prev() {
    $total = Registry::get('total_posts');
    $offset = Registry::get('page_offset');
    $per_page = Config::meta('posts_per_page');
    $page = Registry::get('page');

    if($offset < ceil($total / $per_page)) {
        $offset = '/' . ($offset + 1);
    } else {
        $offset = '';
    }

    if($category = Registry::get('post_category')) {
        $url = base_url('category/' . $category->slug . $offset);
    }else{
    	$url = base_url($page->slug . $offset);
    }

    if($offset!=''){
    	return '<a class="newer-posts" href="'.full_url($url).'"><i class="fa fa-chevron-circle-left"></i> Older</a>';
    }else{
    	return NULL;
    }

}

// Credits to Tovic (http://forums.anchorcms.com/profile/tovic)
// Source: http://forums.anchorcms.com/requests/pagination-should-be-customizable#post-3117
function vapor_posts_next() {
    $total = Registry::get('total_posts');
    $offset = Registry::get('page_offset');
    $per_page = Config::meta('posts_per_page');
    $page = Registry::get('page');

    if($offset > 1) {
        $offset = '/' . ($offset - 1);
    } else {
        $offset = '';
    }

    if($category = Registry::get('post_category')) {
        $url = base_url('category/' . $category->slug . $offset);
    }else{
    	 $url = base_url($page->slug . $offset);
    }

    if($offset!=''){
    	return '<a class="older-posts" href="'.full_url($url).'">Newer <i class="fa fa-chevron-circle-right"></i></a>';
    }else{
    	return NULL;
    }
  
}