<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$subcategory =$_POST['subcategory'];
	
	
	mysqli_query($con,"update subcategory set subcat_name='$subcategory' where subcatid='$id'")or die(mysqli_error());
	
	echo "<script type='text/javascript'>alert('Successfully updated category!');</script>";
	echo "<script>document.location='subcategory.php'</script>";  

	
?>
