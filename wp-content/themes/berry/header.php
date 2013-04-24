<?php global $berry_plugins, $berry_opts; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
		"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
<meta name="author" content="John G. Havlik" />
<meta name="robots" content="index, follow" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php 
	if (is_singular()) wp_enqueue_script('comment-reply'); 
	wp_head(); ?>
</head>
<body>
	<div class="container">
		<div class="header">	
			<?php if($berry_opts['blog_logo_display'] == 'true')
			{?>
				<a title="Return to the home page" href="<?php echo get_option('home'); ?>/"><img alt="<?php echo $berry_opts['blog_logo_alt_txt']; ?>" src="<?php echo $berry_opts['blog_logo_location']; ?>" /></a>
				<p><?php bloginfo('description'); ?></p>
			<?php 
			} 
			else
			{?>
				<h1><a title="Return to the home page" href="<?php echo get_option('home'); ?>/"><?php bloginfo('name');?></a></h1><p><?php bloginfo('description'); ?></p>
			<?php 
			}
			include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
		<div class="navbar">
			<div>
				<?php $berry_plugins->breadcrumb();?>
			</div>
			<ul class="menu">
				<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
				<?php wp_register(); ?>
			</ul>
		</div>