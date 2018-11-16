<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$brandn =$_POST['brandn'];
	$brandm =$_POST['brandm'];
	
	
	mysqli_query($con,"update brand set brandn='$brandn',brandm='$brandm' where brandid='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated Brand!');</script>";
	echo "<script>document.location='http://localhost/GCV%20PosAR/pages/brand.php'</script>";  

	
?>
