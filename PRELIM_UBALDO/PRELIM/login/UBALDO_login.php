<?php 

session_start();


include"style.php";


$error="test";


//setting timezone
date_default_timezone_set('Asia/Manila');

//storing current timestamp
$_SESSION['logdate'] = date("Y-m-d H:i:s");



if(isset($_SESSION['nakapasokna'])){

	echo "<script> window.location.href='Admin'</script>";
}

if(!isset($_SESSION['try'])){
	$_SESSION['try']=0;
}


 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">

 	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


 	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">

 	<title>Welcome!</title>
 </head>
 <body>
 
<form action="#" method="post">
 		

 		<div class="login">

 			
 	

 			<div class="input-box">
 				<p class="p1">Username</p>
 				<input type="text" name="uname"  minlength="9" maxlength="9" style='<?php echo $error_css; ?>' class="input1">
 			</div>

 			<div class="input-box">
 				<p class="p2">Password</p>
 				<input type="password" name="upass" minlength="13" maxlength="13" style='<?php echo $error_css; ?>' class="input2">
 			</div>

 			
 			<a href="Register">New Account?</a>
 			

 			<?php 

 					if($_SESSION['try']>=5){

 			 ?>

 			<div class="logbutton">
 				<input type="submit" name="login" value="Login" class="logb" disabled>
 			</div>

 			<?php 

 					echo "<p class='errorbox'>Specific number of tries used. Please wait.</p>"; 

 				}


 				else{
 			 ?>

				<div class="logbutton">
 				<input type="submit" name="login" value="Login" class="logb">
 			</div>

 			<?php  

 				}
 				
 			?>

 		</div>


 		

 	</form>


 	<?php 

 

 	if(isset($_POST['login'])){

 		$_POST['uname']=htmlspecialchars($_POST['uname']);
 		$_POST['upass']=htmlspecialchars($_POST['upass']);


 		$dec=md5($_POST['upass']);

 		if(!empty($_POST['uname']) && !empty($_POST['upass'])){

 			include "../conf/config.php";

 			$search=mysqli_query($conn, "SELECT * FROM login WHERE uname='".$_POST['uname']."' AND upass='".$dec."'");

 			$T=mysqli_num_rows($search);

 				if ($T>0) {
 						
 					$R=mysqli_fetch_array($search);

 					if($R['status']=='active' && $R['type']=='user'){

 						$_SESSION['name']=$R['uname'];
 						$_SESSION['nakapasokna']='pasok';

 						echo "<script>window.location.href='HomePage'</script>";

 					}


 					elseif ($R['status']=='active' && $R['type']=='admin') {


 						$_SESSION['name']=$R['uname'];
 						$_SESSION['nakapasokna']='pasok';


 						echo "<script>window.location.href='HomePage'</script>";
 						
 					}

 					else{

 						$error="Account Deactivated.Please contact your Administrator!";

 						$_SESSION['try']++;

 						//echo "<script>window.location.href='Welcome'</script>";

 					}
 			
 				}

 			else{

 				

 					echo "<div class='incorrect-box'>";

 						echo"<p class='incorrect'>Oops! Incorrect Credentials. Please try again.</p>";

 					echo"</div>";  

 				$_SESSION['try']++;

 				//echo "<script>window.location.href='Welcome'</script>";

 			}

 		}

 		else{

 			$error="Please fill-out empty fields!";

 			echo "<script>window.location.href='LoginHere'</script>";
 		}
 	}



  ?>




 </body>
 </html>