<?php 

session_start();

include "style.php";




 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
 	<title>Register Here!</title>
 </head>
 <body>
 

 <form action="#" method="post">

<div class="create">
 			
 			<div class="tex">
 				<h1>Create your Account</h1>
 			</div>

 			<div class="cname">
 				
 				<p>New Username</p>
 				<input type="text" name="nuser" minlength="9" maxlength="9" required>

 			</div>

 			<div class="cpass">
 				<p>New Password</p>
 				<input type="password" name="npass" minlength="13" maxlength="13" required>
 			</div>


 			<input type="submit" name="create" value="Create Account" class="logs"> 

 			<a href="LoginHere">Already have an account? Login Here.</a>
 		</div>

</form>



<?php 

	
if(isset($_POST['create'])){



	 $_POST['nuser']=htmlspecialchars($_POST['nuser']);
	 $_POST['npass']=htmlspecialchars($_POST['npass']);

	 $_ENV['enc']=md5($_POST['npass']);

	 $response =$_POST['g-recaptcha-response'];
	 $payload= file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$response.'');
	 $result =json_decode($payload, TRUE);


	 	if($result['success'] !=1){

	 		echo "<span class='error' color='#cc0000'>You are evil or a bot. Try Again!</span>";
	 		return false;
	 	}

	 	else{

	 		 include "../conf/config.php";


	 $que=mysqli_query($conn, "SELECT * FROM login WHERE uname='".$_POST['nuser']."' AND upass='".$_ENV['enc']."'");
	 $R=mysqli_num_rows($que);


	 if ($R>0) {


	 			echo "<div class='incorrect-box'>";

 						echo"<p class='incorrect'>Account already exists!</p>";

 					echo"</div>"; 
	 }

	else{


	 	

	 	$Insert=mysqli_query($conn, "INSERT INTO login (uname,upass,type,status,logtime1) VALUES ('".$_POST['nuser']."','".$_ENV['enc']."','user','active','".$_SESSION['logdate']."')");


 					echo "<div class='incorrect-box'>";

 						echo"<p class='incorrect'>User Created!</p>";

 					echo"</div>"; 

 					//echo "<script>window.location.href='LoginHere'</script>";

 					mysqli_close($conn);				

	}

	 	}
	  
	}






 ?>

 </body>
 </html>
