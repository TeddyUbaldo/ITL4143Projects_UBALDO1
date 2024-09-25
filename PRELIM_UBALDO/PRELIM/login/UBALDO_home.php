<?php 

session_start();


include "style1.php";


if(!isset($_SESSION['name'])){

	echo "<script> alert( 'Please login first...')</script>";
	echo "<script>window.location.href='LoginHere'</script>";
}
	
if(isset($_POST['logout'])){

	unset($_SESSION['name']);


	echo "<script> alert( 'Logging out...')</script>";
	echo "<script>window.location.href='LoginHere'</script>";

	session_destroy();

}







 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">


 	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


 	<title>Hello!</title>
 </head>
 <body>
 

 	<div class="logb">



 		<h1>Home Page</h1>
 		
 		<form action="#" method="post">
 			
 			<input type="submit" name="logout" value="" class="log">
 		</form>

 	</div>





 </body>
 </html>