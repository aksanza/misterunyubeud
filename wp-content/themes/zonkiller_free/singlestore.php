<?php include("lang.php"); ?><div id="breadcrumb"><?php breadcrumbs(); ?></div><div id="kontenutamas"><div id="hailaight">
<script src="<?php bloginfo('template_url'); ?>/js/jq.js" type="text/javascript"></script><script src="<?php bloginfo('template_url'); ?>/js/zoom.js" type="text/javascript"></script>
<script type="text/javascript">$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'standard',
            preloadImages: true,
            alwaysOn:false,
						zoomWidth: 350,
            zoomHeight: 250,
            xOffset: 180,
            yOffset: 270,
            position: "right",
            title: false,
            lens: false
        });
	
});</script>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php require(TEMPLATEPATH."/killersingle.php");?>
<?php $getu=get_bloginfo('template_url');$get_gambar = get_the_content();$get_gambar = str_replace("_SL160_.","_SS500_.",$get_gambar);$gamb=explode("src=\"",$get_gambar,2);$gamba=explode("\"",$gamb[1],2);$get_gambar1 = str_replace("_SL160_.","_SS500_.",$get_gambar);$gamb1=explode("http://ecx",$get_gambar1,2);$gamba1=explode("\"",$gamb1[1],2);$gambar1 = 'http://ecx'.$gamba1[0];if ($gamba[0]==TRUE) {$gambare = $gamba[0];}else{$gambare=$getu.'/images/noimage.jpg';}
$gambarwpz = get_post_meta($post->ID, 'amzn_MediumImageURL', $single = true);$gambarwpz=str_replace("_SL160_.","_SS500_.",$gambarwpz);$gambarasg = get_post_meta($post->ID, 'amazon-image-url', $single = true);$gambarasg=str_replace("_SL160_.","_SS500_.",$gambarasg);$gambarwpr1 = get_post_meta($post->ID, 'image', $single = true);$gambarwpr1=str_replace("_SL160_.","_SS500_.",$gambarwpr1);$gambarwpr1=str_replace("SL300","_SS500_.",$gambarwpr1);$gambarwpr2 = get_post_meta($post->ID, 'thumb', $single = true);$gambarwpr2=str_replace("_SL160_.","",$gambarwpr2);$gambarwpr2=str_replace("SL300","_SS500_.",$gambarwpr2);
$get_gaambar = get_the_content();$get_gaambar = str_replace("SL160","SS250",$get_gaambar);$gaamb=explode("src=\"",$get_gaambar,2);$gaamba=explode("\"",$gaamb[1],2);$get_gaambar1 = str_replace("SL160","SS250",$get_gaambar);$gaamb1=explode("http://ecx",$get_gaambar1,2);$gaamba1=explode("\"",$gaamb1[1],2);if ($gaamba[0]==TRUE) {$gaambare = $gaamba[0];}else{$gaambare=$getu.'/images/noimage.jpg';}
$gaambar1 = 'http://ecx'.$gaamba1[0];$gaambarwpz = get_post_meta($post->ID, 'amzn_MediumImageURL', $single = true);$gaambarwpz=str_replace("SL160","SS250",$gaambarwpz);$gaambarasg = get_post_meta($post->ID, 'amazon-image-url', $single = true);$gaambarasg=str_replace("SL160","SS250",$gaambarasg);$gaambarwpr1 = get_post_meta($post->ID, 'image', $single = true);$gaambarwpr1=str_replace("SL160","SS250",$gaambarwpr1);$gaambarwpr1=str_replace("SL300","SS250",$gaambarwpr1);$gaambarwpr2 = get_post_meta($post->ID, 'thumb', $single = true);$gaambarwpr2=str_replace("SL160","SS250",$gaambarwpr2);$gaambarwpr2=str_replace("SL300","SS250",$gaambarwpr2);$hr1 = get_post_meta($post->ID, 'amzn_ListPrice', $single = true);$hr2 = get_post_meta($post->ID, 'listprice', $single = true);$p1 = get_post_meta($post->ID, 'amzn_LowestNewPrice', $single = true);$p2 = get_post_meta($post->ID, 'price', $single = true);$p3 = get_post_meta($post->ID, 'amazon-price', $single = true);?>

<div class="kiri"><div class="clearfix"><a href="<?php if ($gambar==TRUE){echo $gambar;} elseif($gambarwpz == TRUE) {echo $gambarwpz;} elseif ($gambarasg == TRUE) {echo $gambarasg;} elseif($gambarwpr1 == TRUE) {echo $gambarwpr1;} elseif($gambarwpr2 == TRUE) {echo $gambarwpr2;} elseif($gamba1[0] == TRUE) {echo $gambar1;} else{echo $getu.'/thumb.php?w=500&h=500&zc=2&src='.$gambare;}?>" class="jqzoom" rel='gal1'  ><img src="<?php $gambarsedang=str_replace('SL160','SS250',$gambarsedang);if($gambarsedang==TRUE){echo $gambarsedang;}elseif($gaambarwpz == TRUE) {echo $gaambarwpz;} elseif ($gaambarasg == TRUE) {echo $gaambarasg;} elseif($gaambarwpr1 == TRUE) {echo $gaambarwpr1;} elseif($gaambarwpr2 == TRUE) {echo $gaambarwpr2;} elseif($gaamba1[0] == TRUE) {echo $gaambar1;} else{echo $getu.'/thumb.php?w=250&h=250&zc=2&src='.$gaambare;}?>"  style="border: 1px solid #ccc;"></a></div><br style="clear:both"><ul id="thumblist"><center><?php if($gambar==TRUE) {include(TEMPLATEPATH."/semiauto.php");}else {echo "";}?></center></ul></div>

<div class="kanan"><h1 style="margin-top:0px;padding-top:0px"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<?php echo $bintang;?><?php if ($jmlreview==TRUE) {echo ' ('.$jmlreview.' '.$lang[6].')';}else{echo ' (0 '.$lang[6].' )';}?><br style="clear:both">

<?php if($hargacoret == TRUE) {echo '<span class="ketkiri">'.$lang[0].'</span><span class="ketkanan">: <strike style="color:#cc0000">'.$hargacoret.'</strike></span><br/>';}elseif($hr1 == TRUE) {echo '<span class="ketkiri">'.$lang[0].'</span><span class="ketkanan">: <strike style="color:#cc0000">'.$hr1.'</strike></span><br/>';}elseif($hr2 == TRUE) {echo '<span class="ketkiri">'.$lang[0].'</span><span class="ketkanan">: <strike style="color:#cc0000">'.$hr2.'</strike></span><br/>';}else{echo '<span class="ketkiri">'.$lang[0].'</span><span class="ketkanan">: <strike style="color:#cc0000">'.$lang[12].'</strike></span><br/>';}?>
<?php if ($harga == TRUE) {echo '<span class="ketkiri">'.$lang[1].'</span><span class="ketkanan" style="color:#009900">: '.$harga.'</span><br/>';}elseif ($p1 == TRUE) {echo '<span class="ketkiri">'.$lang[1].'</span><span class="ketkanan" style="color:#009900">: '.$p1.'</span><br/>';}elseif ($p3 == TRUE) {echo '<span class="ketkiri">'.$lang[1].'</span><span class="ketkanan" style="color:#009900">: '.$p3.'</span><br/>';}elseif ($p2 == TRUE) {echo '<span class="ketkiri">'.$lang[1].'</span><span class="ketkanan" style="color:#009900">: '.$p2.'</span><br/>';}else{echo '<span class="ketkiri">'.$lang[1].'</span><span class="ketkanan" style="color:#009900">: '.$lang[12].'</span><br/>';}?>
<?php if ($diskon == TRUE) {echo '<span class="ketkiri">'.$lang[2].'</span><span class="ketkanan">: '.$diskon.' ('.$persen.'%)</span><br/>';}else{echo '';}?>
<?php if ($kondisi == TRUE) {echo '<span class="ketkiri">'.$lang[3].'</span><span class="ketkanan">: '.$kondisi.'</span><br/>';}else{echo "";}?>
<?php if ($persediaan == TRUE) {echo '<span class="ketkiri">'.$lang[4].'</span><span class="ketkanan">: '.$persediaan.'</span><br/>';}else{echo "";}?>
<br style="clear:both;">
 
<div style="display:none">
<div itemscope itemtype="http://data-vocabulary.org/Product">
<span itemprop="brand"><?php echo $brand;?></span> <span itemprop="name"><?php echo $judul;?></span>
<img itemprop="image" src="<?php echo $gambar;?>" />
<span itemprop="review" itemscope
itemtype="http://data-vocabulary.org/Review-aggregate">
Average rating: <span itemprop="rating"><?php echo $rate;?></span>, based on
<span itemprop="count"><?php echo $jmlreview;?></span> reviews
</span>
<span itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer-aggregate">
from <?php echo $currency;?><span itemprop="lowPrice"><?php $a=str_replace($lang[8],"",$harga);echo $a;?></span> to 
<?php echo $currency;?><span itemprop="highPrice"><?php $b=str_replace($lang[8],"",$listp);echo $b;?></span>
<meta itemprop="currency" content="<?php echo $currency;?>" />
</span>
</div>
</div>
  
  <a href="javascript:void(0);" onclick="window.open ('<?php $amz = get_option('nt_lang_act');$trackingid = get_option('nt_zonkiller_affid');$linkref='http://www.'.$amz.'/dp/'.$asin.'?tag='.$trackingid;$linkcok='http://www.'.$amz.'/gp/aws/cart/add.html?AssociateTag='.$trackingid.'&ASIN.1='.$asin.'&Quantity.1=1';$yoi=get_option('nt_cooki');if($yoi=='yes'){echo $linkcok;}else{echo $linkref;}?>','_blank')" rel="nofollow" style="color:#fff;text-transform:uppercase;text-align:center;"><span class="tombolbeli"><?php echo $lang[5];?></span></a><br style="clear:both">
<div id="twitterbutton" class="socials" style="float:left;margin:10px 2px 10px 2px;;"><a href="http://twitter.com/share" class="twitter-share-button"
                    data-url="<?php the_permalink();?>"
                    data-text="<?php the_title();?>" data-count="horizontal"></a>
</div>
<div id="likebutton" class="socials" style="float:left;margin:10px 2px 10px -20px;">
                <iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink();?>%2F&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=verdana
&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;"
                    allowTransparency="true"></iframe>
            </div>
            <div id="plusonebutton" class="socials" style="float:left;margin:10px 2px 10px -10px;">
                <g:plusone size="medium">
                </g:plusone>
            </div>
</div>
<script type='text/javascript' src='http://platform.twitter.com/widgets.js?ver=3.3.2'></script>
<script type='text/javascript' src='http://apis.google.com/js/plusone.js?ver=3.3.2'></script>
<script type='text/javascript' src='http://platform.linkedin.com/in.js?ver=3.3.2'></script>
<br style="clear:both">
<ul class="tabs"><li><a href="#tab1" style="text-transform:uppercase'"><?php echo $lang[7];?></a></li><li><a href="#tab2" style="text-transform:uppercase'"><?php echo $lang[6];?></a></li></ul>
<div id="tab1" class="tab_content"><?php the_content();?><br style="clear:both">
<div id="tagged"><?php the_tags('<span class="tagged2">','</span><span class="tagged2">','</span>');?><br style="clear:both"></div><?php endwhile; else: ?><p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?></div>
<div id="tab2" class="tab_content"><iframe src="<?php echo $review;?>" style="width:100%; height:auto;min-height:500px;border:none"></iframe></div>

<script type="text/javascript">
$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>
<br style="clear:both">
</div>
<?php include(TEMPLATEPATH."/related.php");?></div>
<?php include(TEMPLATEPATH."/s_sidebar.php");?>
<br style="clear:both"><div style="clear:both"></div>