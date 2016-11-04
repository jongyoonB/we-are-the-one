<?php
        header('Content-Type: text/xml');
        $memcache = new Memcache;
        $memcache->connect("jycom.asuscomm.com", 11211);
        $u_nick = $memcache->get('u_nick');
        $u_pic = $memcache->get('u_pic');
        $u_num = $memcache->get('u_num');
        $room = $memcache->get('room');

/*$u_nick = $_COOKIE['u_nick']->u_nick;
$u_pic = $_COOKIE['u_pic']->u_pic;
$u_num = $_COOKIE['u_num']->u_num;
$room  = $_COOKIE['college_num']->college_num;
var_dump($_COOKIE);*/
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<info>
        <nick><?php echo $u_nick; ?></nick>
        <pic><?php echo $u_pic; ?></pic>
        <num><?php echo $u_num; ?></num>
        <room><?php echo $room; ?></room>
</info>

