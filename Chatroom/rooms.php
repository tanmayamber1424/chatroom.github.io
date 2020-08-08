<?php

$roomname  = $_GET['ROOMNAME'];

Include 'dbconnect.php';

$sql = "SELECT * FROM `data of rooms2` WHERE ROOMNAME = '$roomname' ";

$result = mysqli_query($conn,$sql);

if($result){

    if(mysqli_num_rows($result) ==0)
    {

        $message = "This Room Does Not Exist. Try Creating A New Room!";
        echo '<script language="javascript">';
        echo 'alert(" ' .$message. '");';  
      echo 'window.location="http://localhost/chatroom/";';
      echo '</script>';
       

    }

}

else{
    echo "ERROR: ".mysqli_error($conn);
    
}



?>

<!DOCTYPE html>
<html>
<head>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Chatspot.com</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/product/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="chat.png" sizes="32x32" type="image/png">
<link rel="icon" href="chat.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link href="product.css" rel="stylesheet">






<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="chat.png">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyclass{
    height:350px;
    overflow-y:scroll;
}
</style>
</head>
<body>


<nav class="site-header sticky-top py-1">
<h5 class="text-white">Chatspot.com</h5>
<div class="container d-flex flex-column flex-md-row justify-content-between">
  
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="http://localhost/Chatroom/#">Home</a>
    <a class="py-2 d-none d-md-inline-block" href="#">About Us</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Contact Us</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Report Us </a>
  </div>
</nav>

<h2>Chat Messages - <?php echo $roomname; ?></h2>

<div class="container">
<div class="anyclass">
  
  </div>
</div>

<!-- <div class="container darker">
  <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
  <p>Hey! I'm fine. Thanks for asking!</p>
  <span class="time-left">11:01</span>
</div>

<div class="container">
  <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;">
  <p>Sweet! So, what do you wanna do today?</p>
  <span class="time-right">11:02</span>
</div>

<div class="container darker">
  <img src="/w3images/avatar_g2.jpg" alt="Avatar" class="right" style="width:100%;">
  <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
  <span class="time-left">11:05</span>
</div> -->

<input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Add A Message"><br>



<button class="btn btn-primary" name="submitmsg" id="submitmsg">Send</button>



  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 

<script type="text/javascript">

setInterval(runFunction, 1000);
 
function runFunction()
{

 $.post("htcont.php" , {room: '<?php echo $roomname;  ?>' },

    function (data,status)
    {

        document.getElementsByClassName('anyclass')[0].innerHTML = data;

    }

    )

}



var input = document.getElementById("usermsg");

input.addEventListener("keyup", function(event) {

  if (event.keyCode === 13) {
    
    event.preventDefault();
    
    document.getElementById("submitmsg").click();
  }
});


 
   
      $("#submitmsg").click(function(){ 
          var clientmsg = $("#usermsg").val();
       $.post("postmsg.php", {text:clientmsg , ROOM: '<?php echo $roomname;  ?>', IP: '<?php echo $_SERVER['REMOTE_ADDR'];  ?>'},
       function(data,status){
       document.getEementsByClassName('anyclass')[0].innerHTML = data;});
       $("#usermsg").val("");
        return false;
});

</script>
</body>
</html>