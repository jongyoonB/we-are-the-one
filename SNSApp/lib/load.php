<?php
	$result = array();
	$callback = $_GET['callback'];
	$resultData = 'failed';

	$connection = mysqli_connect("localhost", "snsapp", "snsApp12!@", "snsapp");
	mysqli_query("set names utf8");

	$query = mysqli_query($connection, "SELECT * FROM MYSNS_POST ORDER BY pid DESC");

	if($query) {
		$resultData = "success";
		$data = array();
		$num = mysqli_num_rows($query);
		for($i = 0 ; $i < $num ; $i++) {
			mysqli_data_seek($i);
			$row = mysqli_fetch_array($query);
			$id = $row['pid'];
			$subject = $row['psubject'];
			$content = $row['pcontent'];
			$writer = $row['pwriter'];
			$writedate = $row['pwritedate'];
			$data[$i] = array();
			$data[$i]['id'] = $id;
			$data[$i]['subject'] = $subject;
			$data[$i]['content'] = $content;
			$data[$i]['writer'] = $writer;
			$data[$i]['writedate'] = $writedate;
		}
	}

	$result = array('result' => $resultData, 'data' => $data);
	mysqli_close($connection);
	echo $callback . "(" . json_encode($result) . ")";
?>