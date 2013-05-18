<?php $lang_act = get_option('nt_lang_act'); ?>
<?php //English
if(($lang_act == '') || ($lang_act == 'Amazon.com')) { ?>
<?php $lang = array('List Price','Price','You save','Condition','Shipping','Add to cart','customer reviews','Product Description','$','View Details','Visit Website','Related Products');?>
<?php //English UK
} else if($lang_act == 'Amazon.co.uk'){ ?>
<?php $lang = array('List Price','Price','You save','Condition','Shipping','Add to cart','customer reviews','Product Description','&pound;','View Details','Visit Website','Related Products');?>
<?php //English CA
} else if($lang_act == 'Amazon.ca'){ ?>
<?php $lang = array('List Price','Price','You save','Condition','Shipping','Add to cart','customer reviews','Product Description','CDN$','View Details','Visit Website','Related Products');?>
<?php //German
} else if($lang_act == 'Amazon.de'){ ?>
<?php $lang = array('Unverb. Preisempf.','Preis','Sie sparen','Zustand','Versand','in den Warenkorb','Kundenrezensionen','Produktbeschreibungen','EUR','Details','zur Webseite','verwandte Produkte');?>
<?php // French//
} else if($lang_act == 'Amazon.fr'){ ?>
<?php $lang = array('Prix conseillé','Prix','Économisez','Condition','Navigation','ajouter au panier','commentaires client','Description du produit','EUR','détails','visitez le site Web','produits associés');?>
<?php // italian//
} else if($lang_act == 'Amazon.it'){ ?>
<?php $lang = array('Prezzo consigliato','Prezzo','Risparmi','Condizione','Spedizione','compralo subito','recensioni clienti','Descrizione prodotto','EUR','dettagli','Visita il sito','prodotti correlati');?>
<?php // Spanish//
} else if($lang_act == 'Amazon.es'){ ?>
<?php $lang = array('Precio recomendado','Precio','Ahorras','Condición','Envío','añadir al carrito','opiniones de clientes','Descripción del producto','EUR','detalles','Visite el sitio web','productos relacionados');?>
<?php // Japanese//
} else if($lang_act == 'Amazon.co.jp'){ ?>
<?php $lang = array('参考価格','価格','OFF','コンディション','発送','カートに追加','件のカスタマーレビュー','商品の詳細','¥','詳細を表示','ウェブサイトを訪問','の関連製品');?>
<?php } else { ?>
<?php } ?>