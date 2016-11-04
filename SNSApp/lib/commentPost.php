<?php
	$result = array();
	$callback = $_GET['callback'];
	$parentId = $_GET['parentId'];
	$content = $_GET['content'];
	$writer = $_GET['writer'];
	$writedate = date('Y-m-d (H:i:s)');
	$resultData = 'failed';

$connection = mysqli_connect("localhost", "snsapp", "snsApp12!@", "snsapp");
	mysqli_query("set names utf8");

	$query = mysqli_query($connection, "INSERT INTO MYSNS_COMMENT(pparent, pcontent, pwritedate, pwriter) VALUES('" . $parentId . "', '" . $content . "', '" . $writedate . "', '" . $writer . "')");

	if($query) $resultData = "success";

	$lid = mysqli_insert_id($connection);
	$result = array('result' => $resultData, 'lastId' => $lid);
	mysqli_close($connection);
	echo $callback . "(" . json_encode($result) . ")";
?>