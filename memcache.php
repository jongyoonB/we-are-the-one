<?php session_start(); ?>
<pre>
<?php
$presessdata = @$_SESSION["data"];
$_SESSION["data"] = @$_SESSION["data"] + 1;
 
$memcache = new Memcache;
$memcache->connect("localhost", 11211);
print_r($memcache->getStats());
 
$items = array(
    'key1' => 'value1',
    'key2' => 'value2',
    'key3' => 'value3'
);
foreach ($items as $k => $v) {
    $memcache->set($k, $v);
}
var_dump($memcache->get(array('key1', 'key3')));
var_dump($memcache->get('key2'));
var_dump($memcache->get('key4'));
?>
SESSION: <?php echo $_SESSION["data"]; ?>
</pre>
