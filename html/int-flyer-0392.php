<?php
header('Access-Control-Allow-Origin: *');  

//$content = file_get_contents('http://www.flyertown.ca/mobile/sportchek/flyers?locale=en&postal_code=V5H4M1&type=1');
$content = file_get_contents('http://www.flyertown.ca/mobile/sportchek-sportchek/flyer_items/26205?locale=en&postal_code=V5H4M1&type=1#category_2322');


/*
$content = str_replace('"store_locator_url":"http://www.sportchek.ca/storeLocator/index.jsp"','"store_locator_url":null', $content);

$content = str_replace('{"id":3370987,"left":67872.0,"bottom":-2560.0,"right":71103.0,"top":0.0,"name":"Page 22","page":22}','', $content);
$content = str_replace('{"id":3370986,"left":64640.0,"bottom":-2560.0,"right":67871.0,"top":0.0,"name":"Page 21","page":21}','{"id":3370986,"left":66640.0,"bottom":-2560.0,"right":68071.0,"top":0.0,"name":"Page 21","page":21}', $content);
*/

$content = str_replace('<link href="','<link href="http://www.flyertown.ca', $content);
$content = str_replace('<script src="','<script src="http://www.flyertown.ca', $content);            	
$content = str_replace('<link rel="stylesheet" href="','<link rel="stylesheet" href="http://www.flyertown.ca', $content);           
 	
echo $content;


?>