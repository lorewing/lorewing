<?php $meta = array(
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'description', 'content' => 'Whirlpool Canada Roadshow - www.whirlpoolroadshow.com'),
        array('name' => 'keywords', 'content' => 'Whirlpool, Roadshow, Whirlpool Roadshow , kitchenaid , maytag , Whirlpool Canada Roadshow , Tournée de présentation de Whirlpool Canada ,  '),
        array('name' => 'robots', 'content' => 'no-cache'),
        array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
    );
echo meta($meta); 
?>
<meta name="viewport" content="width=device-width">
<title><?php echo $this->general->getSettingValue("login_page_heading")?></title>
