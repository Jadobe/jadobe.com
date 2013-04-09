<!DOCTYPE html>
<?php //=======================================================================
	// Sets up the main header
	//========================================================================*/ 
?>
<html>
	<head>
		<meta charset="<?php bloginfo('charset');?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Jadobe</title>
		<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url').'/favicon.ico';?>" type="image/x-icon">
		<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/touch-icon-iphone.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url'); ?>/touch-icon-ipad.png" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url'); ?>/touch-icon-iphone-retina.png" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url'); ?>/touch-icon-ipad-retina.png" />

		<?php //=======================================================================
		// Fonts
		//========================================================================*/ ?>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,800' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/style.css">

		<!--[if lt IE 8]><script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/modernizr.js"></script><![endif]-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php //=======================================================================
		// Header
		//========================================================================*/ ?>
		<header class="main">
			<div>
				<menu>
					<a class="nostyle" href="<?php bloginfo('url');?>/"><img src="<?php bloginfo('template_directory');?>/img/logo-menu.png" alt="Home"></a>
					<a href="<?php bloginfo('url');?>/lab"><?php _e('Lab'); ?></a>
				</menu>
			</div>
		</header>