<?php get_header(); ?>
<?php $yoibro=get_option('nt_sowid');if($yoibro=='yes'){include(TEMPLATEPATH."/slider.php");}else{echo '';}?><div style="margin-top:30px;clear:both"></div>
<?php $style = get_option('nt_model');?><?php if($style == "blog") {include(TEMPLATEPATH."/blog.php");} else {include(TEMPLATEPATH."/store.php");}?>
<?php get_footer(); ?>