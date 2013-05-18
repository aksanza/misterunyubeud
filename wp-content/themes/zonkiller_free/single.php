<?php get_header(); ?>
<?php $style = get_option('nt_sgmodel');?><?php if($style == "blog") {include(TEMPLATEPATH."/singleblog.php");} else {include(TEMPLATEPATH."/singlestore.php");}?>
<?php get_footer(); ?>