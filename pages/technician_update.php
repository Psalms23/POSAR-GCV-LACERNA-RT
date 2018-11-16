<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$fname =$_POST['fname'];
	$lname =$_POST['lname'];
	$cno =$_POST['cno'];
	
	
	mysqli_query($con,"update technician set fname='$fname',lname='$lname', cno='$cno' where techid='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated Technician Information!');</script>";
	echo "<script>document.location='technician.php'</script>";  

	
?>
