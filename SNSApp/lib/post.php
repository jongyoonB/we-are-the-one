<?php
	$result = array();
	$callback = $_GET['callback'];
	$subject = $_GET['subject'];
	$content = $_GET['content'];
	$writer = $_GET['writer'];
	$writedate = date('Y-m-d (H:i:s)');
	$resultData = 'failed';

$connection = mysqli_connect("localhost", "snsapp", "snsApp12!@", "snsapp");	mysqli_query("set names utf8");

	$query = mysqli_query($connection, "INSERT INTO MYSNS_POST(psubject, pcontent, pwritedate, pwriter) VALUES('" . $subject . "', '" . $content . "', '" . $writedate . "', '" . $writer . "')");

	if($query) $resultData = "success";
	$result = array('result' => $resultData);
	mysqli_close($connection);
	echo $callback . "(" . json_encode($result) . ")";
?>