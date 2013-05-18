<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head><title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="icon" type="image/png" href="<?php echo get_option("nt_icon"); ?>"/>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/warna/<?php $sts = get_option('nt_color');if ($sts==TRUE) {echo $sts;} else{echo "red";}?>.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script src="<?php bloginfo('template_url'); ?>/js/jq.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/slider.js" type="text/javascript"></script> 
		<script type="text/javascript" language="javascript">
			$(function() {

				//	Scrolled by user interaction
				$('#foo2').carouFredSel({
					prev: '#prev2',
					next: '#next2',
					pagination: "#pager2",
					auto: <?php $so=get_option('nt_sowaut');if ($so=='false'){echo 'false';}else{echo 'true';}?>,
					height: '200'
				});
			});
		</script>
<style type="text/css" media="all">
 body {background: <?php echo get_option('nt_bg');?> url(<?php bloginfo('template_url'); ?>/warna/images/<?php $bb=get_option('nt_bgg');echo $bb.'.jpg';?>); font-family:<?php echo get_option('nt_ff');?>;}
  <?php $css=get_option('nt_css');$css=str_replace('\\','',$css);echo $css;?>
</style>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
<div id="header">
  <h1><a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_option('nt_logo');?>" alt="<?php bloginfo('name'); ?>"/></a></h1></div>
<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
<center><?php $ik=get_option('nt_adnav');$ik=str_replace('\\','',$ik);if ($ik==TRUE) {echo $ik.'<br style="clear:both">';}else{echo '';}?></center>