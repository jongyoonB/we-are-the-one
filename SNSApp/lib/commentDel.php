<?php
	$result = array();
	$callback = $_GET['callback'];
	$postId = $_GET['postId'];
	$resultData = 'failed';

	$connection = mysqli_connect("localhost", "snsapp", "snsApp12!@", "snsapp");
	mysqli_query("set names utf8");

	$query = mysqli_query($connection, "DELETE FROM MYSNS_COMMENT WHERE pid = ".$postId);

	if($query) $resultData = "success";
	$result = array('result' => $resultData);
	mysqli_close($connection);
	echo $callback . "(" . json_encode($result) . ")";
?>