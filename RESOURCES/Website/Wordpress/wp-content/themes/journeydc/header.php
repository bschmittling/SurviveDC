<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="http://www.facebook.com/2008/fbml">


<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if(is_home()){ ?>
<meta property="og:title" content="<?php bloginfo('name'); ?>" />
<meta property="og:url" content="<?php bloginfo('url'); ?>"/>
<meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/survivedc-facebook.jpg" />
<meta property="og:description" content="<?php bloginfo('description'); ?>" />
<meta property="og:type" content="website"/>
<meta property="og:site_name" content="SurviveDC.com" />
<?php }else{ ?>
<meta property="og:title" content="<?php the_title(); ?>" />
<meta property="og:url" content="<?php the_permalink(); ?> "/>
<meta property="og:image" content="<?php bloginfo('template_url'); ?>/images/survivedc-facebook.jpg" />
<meta property="og:type" content="article"/>
<meta property="og:site_name" content="SurviveDC.com" />
<?php } ?>

	<script src="<?php bloginfo('template_url'); ?>/site.js" type="text/javascript"></script>	
	<?php wp_head(); ?>
</head>
<body>

