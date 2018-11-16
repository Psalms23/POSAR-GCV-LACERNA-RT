<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$ci =$_POST['ci'];
	$payslip =$_POST['payslip'];
	$valid_id = $_POST['valid_id'];
	$cert = $_POST['cert'];
	$cedula = $_POST['cedula'];
	$income = $_POST['income'];


	
	mysqli_query($con,"update customer set ci_remarks='$ci',payslip='$payslip',
	valid_id='$valid_id',cert='$cert',cedula='$cedula',income='$income' where cust_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully added creditor details!');</script>";
	echo "<script>document.location='creditor1.php'</script>";  

	
?>

