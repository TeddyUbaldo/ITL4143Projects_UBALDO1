<?php 


$url=isset($_GET['url']) ? $_GET['url'] : 'index';


switch ($url) {

	case 'Home':
		include 'UBALDOhome.php';
		break;

	case 'Login':
		include 'UBALDOlogin.php';
		break;

	case 'RegisterHere':
		include 'UBALDOreg.php';
		break;	
		
	default:
		echo "<script>window.location.href='Login'</script>";
		break;
}
 


 ?>
 