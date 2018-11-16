<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$username = $_POST['username'];
	$position = $_POST['position'];
	$name = $_POST['name'];
	$lname = $_POST['lname'];
	$cno = $_POST['cno'];
	
	mysqli_query($con,"update user set username='$username',position='$position',name='$name',lname='$lname',cno='$cno' where user_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated user details!');</script>";
	echo "<script>document.location='user.php'</script>";  

	
?>
