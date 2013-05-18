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
$params["ResponseGroup"] = "Images,Offers,ItemAttributes";
$params["Version"] ="2011-08-01";
    $method = "GET";
    $host = "webservices.amazon.".$negara;
    $uri = "/onca/xml";
    $params["AWSAccessKeyId"] = $public_key;
    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
    
    ksort($params);
    
    $canonicalized_query = array();
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
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 180);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 180);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    $response = curl_exec($ch);
    $pxml = simplexml_load_string($response);
$gambarsedang=$pxml->Items->Item->MediumImage->URL;
$harga=$pxml->Items->Item->Offers->Offer->OfferListing->Price->FormattedPrice;
$currency=$pxml->Items->Item->Offers->Offer->OfferListing->Price->CurrencyCode;
$lonk=$pxml->Items->Item->Offers->MoreOffersUrl;
$link=str_replace("gp/offer-listing","dp",$lonk);
$fitur=$pxml->Items->Item->ItemAttributes->Feature;
$diskon=$pxml->Items->Item->Offers->Offer->OfferListing->AmountSaved->FormattedPrice;
$persen=$pxml->Items->Item->Offers->Offer->OfferListing->PercentageSaved;
$hargacoret=$pxml->Items->Item->ItemAttributes->ListPrice->FormattedPrice;
?>