<?php get_header(); ?><div id="breadcrumb"><?php breadcrumbs(); ?></div>
<?php include(TEMPLATEPATH."/sidebar.php");?>
<div id="kontenutama"> <div class="postingan"><?php if (have_posts()) : while (have_posts()) : the_post(); ?><h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2><?php the_content(); ?><?php endwhile; else: ?>	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><br style="clear:both;"></div></div>

<?php include(TEMPLATEPATH."/r_sidebar.php");?><br style="clear:both"><div style="clear:both"></div><?php get_footer()?>