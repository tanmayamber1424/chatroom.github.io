<?php

include 'dbconnect.php';

$msg = $_POST['text'];
$room = $_POST['ROOM'];
$ip = $_POST['IP'];

$sql = "INSERT INTO `msgs` (`MESSAGE`, `ROOM`, `IP`, `sTIME`) VALUES ('$msg', '$room', '$ip', CURRENT_TIMESTAMP);";

mysqli_query($conn,$sql);
mysqli_close($conn);


?>