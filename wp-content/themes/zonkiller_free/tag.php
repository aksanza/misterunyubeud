<?php get_header(); ?>
<?php $style = get_option('nt_model');?><?php if($style == "blog") {include(TEMPLATEPATH."/blog.php");} else {include(TEMPLATEPATH."/store.php");}?>
<?php get_footer(); ?>