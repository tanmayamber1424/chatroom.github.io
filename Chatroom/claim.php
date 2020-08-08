<?php

$room = $_POST['room'];

if(strlen($room)>20 or strlen($room)<2 ){
    $message = "Please Choose Your Name Between 2 To 20 Characters";
    echo '<script language="javascript">';
  echo 'alert(" ' .$message. '");'; 
  echo 'window.location="http://localhost/chatroom";';
  echo '</script>';
  exit;
}
elseif(!ctype_alnum($room)){
    $message = "Please Choose Your Alphanumeric Room Name";
    echo '<script language="javascript">';
    echo 'alert(" ' .$message. '");';  
  echo 'window.location="http://localhost/chatroom";';
  echo '</script>';
  exit;
}else{
    include 'dbconnect.php';
}

$sql = "SELECT * FROM `data of rooms2` WHERE ROOMNAME = '$room'";

$result = mysqli_query($conn,$sql);

if($result)
{

if(mysqli_num_rows($result)>0){
  $message = "Please Choose Another Name This Room Already Exists.";
    echo '<script language="javascript">';
    echo 'alert(" ' .$message. '");';  
  echo 'window.location="http://localhost/chatroom";';
  echo '</script>';
  exit;
}else{
 
  $sql = "INSERT INTO `data of rooms2` (`S NO.`, `ROOMNAME`, `sTime`) VALUES ('1', '$room', current_timestamp());";
if(mysqli_query($conn,$sql)){
  $message = "Your Room is Ready Go And Chat ";
    echo '<script language="javascript">';
    echo 'alert(" ' .$message. '");';  
  echo 'window.location="http://localhost/chatroom/rooms.php?ROOMNAME=' .$room. '";';
  echo '</script>';
  exit;
}

}

}

?>