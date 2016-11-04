<?php
	$result = array();
	$callback = $_GET['callback'];
	$id = $_GET['id'];
	$pw = $_GET['pw'];
	$resultData = 'failed';

	$connection = mysqli_connect("localhost", "snsapp", "snsApp12!@", "snsapp");
	mysqli_query("set names utf8");

	$query = mysqli_query($connection, "INSERT INTO MYSNS_ACCOUNT(mid, mpw) VALUES('" . $id . "', '" . $pw . "')");

	if($query) $resultData = "success";
	$result = array('result' => $resultData);
	mysqli_close($connection);
	echo $callback . "(". json_encode($result) . ")";
?>