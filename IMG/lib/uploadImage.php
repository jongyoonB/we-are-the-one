<?php
  $result = array();
  $resultData = "failed";

  $connection = mysqli_connect("localhost","imgg","imgG12!@", "imgG");
  mysqli_query("set name utf8");
  $tmp=0;
  $today = date("Y-m-d (H:i:s)");
  $fileName = $today.".jpg";
  if(move_uploaded_file($_FILES['file']['tmp_name'],"/var/www/html/IMG/lib/image/".$fileName)){
    chmod("/var/www/html/IMG/lib/image/".$fileName, 0777);
    $query = mysqli_query($connection,"INSERT INTO img(imageName) VALUE('".$fileName. "')");
    $tmp = $query;
    if($query)
      $resultData = "success";
    else
      unlink("/var/www/html/IMG/lib/image/".$fileName);
  }
  else echo "!"; 
  $result = array('result' => $resultData, 'imageName' => $fileName, 'files' => $_FILES, 'tmp' => $tmp);

  mysqli_close($connection);

  echo json_encode($result);
 ?>
