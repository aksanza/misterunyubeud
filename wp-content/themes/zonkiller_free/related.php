<div id="related"><span class="relatedpost"><?php echo $lang[11];?></span><br style="clear:both">
<?php
$categories = get_the_category($post->ID);
if ($categories) {
	$category_ids = array();
	foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

	$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'showposts'=>6, // Number of related posts that will be shown.
		'caller_get_posts'=>1,
		'orderby'=>'rand'
	);
$my_query = new wp_query($args);
	if( $my_query->have_posts() ) {
		echo '';
		while ($my_query->have_posts()) {
			$my_query->the_post();
		?>
  <?php $postingan = get_option('nt_post');$get_gambar = get_the_content();$get_gambar = str_replace("SL160","SS150",$get_gambar);$gamb=explode("src=\"",$get_gambar,2);$gamba=explode("\"",$gamb[1],2);$get_gambar1 = str_replace("SL160","SS150",$get_gambar);$gamb1=explode("http://ecx",$get_gambar1,2);$gamba1=explode("\"",$gamb1[1],2);$gambar = $gamba[0];$gambar1 = 'http://ecx'.$gamba1[0];$gambarwpz = get_post_meta($post->ID, 'amzn_MediumImageURL', $single = true);$gambarwpz=str_replace("SL160","SS150",$gambarwpz);$gambarasg = get_post_meta($post->ID, 'amazon-image-url', $single = true);$gambarwpz=str_replace("SL160","SS150",$gambarwpz);$gambarwpr1 = get_post_meta($post->ID, 'image', $single = true);$gambarwpr1=str_replace("SL160","SS150",$gambarwpr1);$gambarwpr1=str_replace("SL300","SS150",$gambarwpr1);$gambarwpr2 = get_post_meta($post->ID, 'thumb', $single = true);$gambarwpr2=str_replace("SL160","SS150",$gambarwpr2);$gambarwpr2=str_replace("SL300","SS150",$gambarwpr2);$geturl=get_bloginfo('template_url');$hr1 = get_post_meta($post->ID, 'amzn_ListPrice', $single = true);$hr2 = get_post_meta($post->ID, 'listprice', $single = true);$p1 = get_post_meta($post->ID, 'amzn_LowestNewPrice', $single = true);$p2 = get_post_meta($post->ID, 'price', $single = true);$p3 = get_post_meta($post->ID, 'amazon-price', $single = true);$per=get_permalink();require(TEMPLATEPATH."/killer.php");?><div class="featureditemr"><h2><a style="color:#111" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php $the_title = $post->post_title;  $getlength = strlen($the_title); $thelength = 50; echo substr($the_title, 0, $thelength); if ($getlength > $thelength) ; ?></a></h2><br/><center><a href="<?php the_permalink();?>"><img src="<?php if ($gambarwpz == TRUE) {echo $gambarwpz;} elseif ($gambarasg == TRUE) {echo $gambarasg;} elseif($gambarwpr1 == TRUE) {echo $gambarwpr1;} elseif($gambarwpr2 == TRUE) {echo $gambarwpr2;} elseif($gambar1 == TRUE) {echo $gambar1;} else{echo $geturl.'/thumb.php?w=150&h=150&zc=2&src='.$gambar;}?>" style="height:150px; width:150px" alt="<?php the_title(); ?>"/></a><br/><?php if ($hargacoret == TRUE) {echo '<del style="color:#dd0000">'.$hargacoret.'</del> / ';} elseif($hr1==TRUE) {echo '<del style="color:#dd0000">'.$hr1.'</del> / ';} elseif($hr2==TRUE) {echo '<del style="color:#dd0000">'.$hr2.'</del> / ';} else{echo "";}?><?php if ($harga == TRUE) {echo '<span style="color:#04B431;">'.$harga.'</span><br/>';} elseif($p1==TRUE) {echo '<span style="color:#04B431;">'.$p1.'</span><br/>';} elseif($p3==TRUE) {echo '<span style="color:#04B431;">'.$p3.'</span><br/>';} elseif($p2==TRUE) {echo '<span style="color:#04B431;">'.$p2.'</span><br/>';} else{echo '<a style="color:#04B431;" href="'.$per.'">'.$lang[12].'</a><br/>';}?></center><a href="<?php the_permalink();?>" style="text-transform:uppercase;color:#fff;"><span class="tombolditail3"><?php $vdt=get_option('nt_vdt');if ($vdt==TRUE){echo $vdt;} else {echo $lang[9];}?></span></a><a href="javascript:void(0);" onclick="window.open ('<?php $amz = get_option('nt_lang_act');$trackingid = get_option('nt_zonkiller_affid');$linkref='http://www.'.$amz.'/dp/'.$asin.'?tag='.$trackingid;$linkcok='http://www.'.$amz.'/gp/aws/cart/add.html?AssociateTag='.$trackingid.'&ASIN.1='.$asin.'&Quantity.1=1';$yoi=get_option('nt_cooki');if($yoi=='yes'){echo $linkcok;}else{echo $linkref;}?>','_blank')" rel="nofollow" style="text-transform:uppercase;color:#fff;"><span class="tombolbeli3"><?php $atc=get_option('nt_atc');if ($atc==TRUE){echo $atc;} else {echo $lang[5];}?></span></a><?php if ($diskon == TRUE) {echo '<div class="offr"><center>'.$diskon.'<br/>OFF</center></div>';}else{echo '';}?></div>
		<?php
		}
		echo '';
	}
}
?></div>