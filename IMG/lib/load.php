<?php
  $result = array();
  $callback = $_GET['callback'];
  $resultData = 'failed';

  $connection = mysqli_connect("localhost","imgg","imgG12!@", "imgG");
  mysqli_query("set names utf8");

  $query = mysqli_query($connection, "SELECT * FROM img ORDER BY id DESC");

  if($query){
    $resultData = "success";
    $data = array();

    $num = mysqli_num_rows($query);

    for($i = 0 ; $i < $num ; $i++){
      mysqli_data_seek($i);
      $row = mysqli_fetch_array($query);

      $id = $row['id'];
      $imageName = $row['imageName'];

      $data[$i] = array();
      $data[$i]['id'] = $id;
      $data[$i]['imageName'] = $imageName;
    }
  }

  $result = array('result' => $resultData, 'data' => $data);

  mysqli_close($connection);

  echo $callback."(".json_encode($result).")";
 ?>
