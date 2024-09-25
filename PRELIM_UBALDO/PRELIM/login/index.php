<?php 


$url=isset($_GET['url']) ? $_GET['url'] : 'index';


switch ($url) {

	case 'HomePage':
		include 'UBALDO_home.php';
		break;

	case 'LoginHere':
		include 'UBALDO_login.php';
		break;

	case 'Register':
		include 'UBALDO_reg.php';
		break;
		
	default:
		echo "<script>window.location.href='LoginHere'</script>";
		break;
}
 


 ?>
 