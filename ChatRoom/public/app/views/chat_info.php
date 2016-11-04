<?php
	header('Content-Type: text/xml');
	$memcache = new Memcache;
	$memcache->connect("jycom.asuscomm.com", 11211);
	$u_nick = $memcache->get('u_nick');
	$u_pic = $memcache->get('u_pic');
	$u_num = $memcache->get('u_num');	
	$college = $memcache->get('college');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<info>
	<nick><?php echo $u_nick; ?></nick>
	<pic><?php echo $u_pic; ?></pic>
	<num><?php echo $u_num; ?></num>
	<college><?php echo $college; ?></college>
</info>
