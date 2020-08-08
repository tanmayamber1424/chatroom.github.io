<?php

$room = $_POST['room'];

include 'dbconnect.php';


$sql = "SELECT MESSAGE, sTIME, IP FROM msgs WHERE ROOM = '$room' ";

$res = "";

$result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result)>0) {
 

 	while ($row = mysqli_fetch_assoc($result))
 	 {
 		$res  = $res  . '<div class="container">';
 		$res  = $res  . $row['IP'];
 		$res  = $res  . " says  <p>" . $row['MESSAGE']; 
 		$res  = $res  . '</p> <span class="time-right">' . $row["sTIME"] . '</span></div>' ;

 	}
 }

 	echo $res;

?>