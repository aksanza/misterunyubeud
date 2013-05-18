<?php include(TEMPLATEPATH."/lang.php");?><?php
$negara = get_option('nt_lang_act');
$negara = str_replace ("Amazon.","",$negara);
$a = get_the_content();
$aa = explode("dp/",$a,2);
$aaa = explode("%",$aa[1],2);
$b = $aaa[0];
$aa2 = explode("dp/tech-data/",$a,2);
$aaa2 = explode("%",$aa2[1],2);
$b2 = $aaa[0];
$aa3 = explode("/product/",$a,2);
$aaa3 = explode("/",$aa3[1],2);
$b3 = $aaa3[0];
$c = get_post_meta($post->ID, "link", $single = true);
$cc = explode("dp/",$c,2);
$ccc = explode("%",$cc[1],2);
$d = $ccc[0];
if(get_post_meta($post->ID, "asg_item_id", $single = true) != ""){$asin = get_post_meta($post->ID, "asg_item_id",$single = true);} 
elseif(get_post_meta($post->ID, "amzn_ASIN", $single = true) != ""){$asin = get_post_meta($post->ID, "amzn_ASIN",$single = true);}
elseif(get_post_meta($post->ID, "link", $single = true) != ""){$asin = $d;}
elseif(get_post_meta($post->ID, "ASIN", $single = true) != ""){$asin = get_post_meta($post->ID, "ASIN",$single = true);}elseif(get_post_meta($post->ID, "asin", $single = true) != ""){$asin = get_post_meta($post->ID, "asin",$single = true);}elseif($aaa3[0]==TRUE){$asin = $b3;}elseif($aaa2[0]==TRUE){$asin = $b2;}
else{$asin = $b;}

$public_key=get_option('nt_zonkiller_api');
$private_key=get_option('nt_zonkiller_key');
$trackingid=get_option('nt_zonkiller_affid');

$params["AssociateTag"] = $trackingid;
$params["Operation"] = "ItemLookup";
$params["Service"] = "AWSECommerceService";
$params["ItemId"] = $asin;
$params["ResponseGroup"] = "Images,Reviews,Offers,ItemAttributes";
$params["Version"] ="2011-08-01";
    $method = "GET";
    $host = "webservices.amazon.".$negara;
    $uri = "/onca/xml";
    $params["AWSAccessKeyId"] = $public_key;
    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");

	ksort($params);$canonicalized_query = array();
    foreach ($params as $param=>$value)
    {
        $param = str_replace("%7E", "~", rawurlencode($param));
        $value = str_replace("%7E", "~", rawurlencode($value));
        $canonicalized_query[] = $param."=".$value;
    }
    $canonicalized_query = implode("&", $canonicalized_query);
    $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $private_key, True));
    $signature = str_replace("%7E", "~", rawurlencode($signature));
    $request = "http://".$host.$uri."?".$canonicalized_query."&Signature=".$signature;

	    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$request);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    $response = curl_exec($ch);
    $pxml = simplexml_load_string($response);
$item=$pxml->Items->Item;$judul=$pxml->Items->Item->ItemAttributes->Title;$gambarsedang=$pxml->Items->Item->MediumImage->URL;$gambar=$gambarsedang;$gambar=str_replace("SL160","SS500",$gambar);$gambarkecil=$pxml->Items->Item->SmallImage->URL;$brand=$pxml->Items->Item->ItemAttributes->Brand;$harga=$pxml->Items->Item->Offers->Offer->OfferListing->Price->FormattedPrice;$currency=$pxml->Items->Item->Offers->Offer->OfferListing->Price->CurrencyCode;$link=$pxml->Items->Item->DetailPageURL;$listp=$pxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice;$jumlahbaru=$pxml->Items->Item->OfferSummary->TotalNew;$jumlahlama=$pxml->Items->Item->OfferSummary->TotalUsed;$diskripsi=$pxml->Items->Item->EditorialReviews->EditorialReview->Content;$review=$pxml->Items->Item->CustomerReviews->IFrameURL;$diskon=$pxml->Items->Item->Offers->Offer->OfferListing->AmountSaved->FormattedPrice;$kondisi=$pxml->Items->Item->Offers->Offer->OfferAttributes->Condition;$persen=$pxml->Items->Item->Offers->Offer->OfferListing->PercentageSaved;$persediaan=$pxml->Items->Item->Offers->Offer->OfferListing->Availability;
$hargacoret=$pxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice;
if ($review==TRUE) {$revi = file_get_contents($review);}
$page1 = explode("/product-reviews/",$revi,2);$page2 = $page1[1];
$rating = explode("alt=\"",$page2,2);$ratingtitle=explode("\"",$rating[1],2);$ratitle=$ratingtitle[0];$bnt=explode(" ",$ratitle,2);
$rate = $bnt[0];
if ($rate == '0' || $rate == '0.1' || $rate == '0.2'){$btg='0';}elseif ($rate == '0.3' || $rate == '0.4' || $rate == '0.5' || $rate == '0.6' || $rate == '0.7'){$btg='0.5';}elseif ($rate == '0.8' || $rate == '0.9' || $rate == '1.0' || $rate == '1.1' || $rate == '1.2'){$btg='1';}elseif ($rate == '1.3' || $rate == '1.4' || $rate == '1.5' || $rate == '1.6' || $rate == '1.7'){$btg='1.5';}elseif ($rate == '1.8' || $rate == '1.9' || $rate == '2.0' || $rate == '2.1' || $rate == '2.2'){$btg='2';}elseif ($rate == '2.3' || $rate == '2.4' || $rate == '2.5' || $rate == '2.6' || $rate == '2.7'){$btg='2.5';}elseif ($rate == '2.8' || $rate == '2.9' || $rate == '3.0' || $rate == '3.1' || $rate == '3.2'){$btg='3';}elseif ($rate == '3.3' || $rate == '3.4' || $rate == '3.5' || $rate == '3.6' || $rate == '3.7'){$btg='3.5';}elseif ($rate == '3.8' || $rate == '3.9' || $rate == '4.0' || $rate == '4.1' || $rate == '4.2'){$btg='4';}elseif ($rate == '4.3' || $rate == '4.4' || $rate == '4.5' || $rate == '4.6' || $rate == '4.7'){$btg='4.5';}elseif ($rate == '4.8' || $rate == '4.9' || $rate == '5.0'){$btg='5';}else{$btg='0';}               
$bintang = '<img src="'.get_bloginfo('template_url').'/images/'.$btg.'.png" title="'.$ratitle.'" style="margin-bottom:-5px">';
$halrev1=explode('<div style="display:block; text-align:center; padding-bottom: 5px;" class="tiny">',$revi,2);
$halrev2=explode('</a>)',$halrev1[0],2);$halrev3=explode('</a>&nbsp;</span>(<a href',$halrev2[0],2);$halrev4=explode('target="_top">',$halrev3[1],2);
$jmlreview=$halrev4[1];
$jmlreview = preg_replace('/\D/', '', $jmlreview);;
?>