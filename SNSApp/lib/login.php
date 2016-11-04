<?php
	$result = array();
	$callback = $_GET['callback'];
	$id = $_GET['id'];
	$pw = $_GET['pw'];
	$resultData = 'failed';

$connection = mysqli_connect("localhost", "snsapp", "snsApp12!@", "snsapp");	mysqli_query("set names utf8");

	$query = mysqli_query($connection, "SELECT * FROM MYSNS_ACCOUNT WHERE mid = '" . $id . "' AND mpw = '" . $pw . "'");

	if($query){
		$dataCnt = mysqli_num_rows($query);
		
		if($dataCnt)
			$resultData = "success";
		else
			$resultData = "wrong";
	}

	$result = array('result' => $resultData);
	mysqli_close($connection);
	echo $callback . "(" . json_encode($result) . ")";
?>