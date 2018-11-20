<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$qty =$_POST['qty'];
	$cid =$_POST['cid'];
	
	$query=mysqli_query($con,"select prod_price,prod_id,prod_qty from product where prod_id='$id'")or die(mysqli_error());
	$row=mysqli_fetch_array($query);

	if ($row['prod_qty'] == 0 || $row['prod_qty'] < $qty ) {
		echo "<script>alert('Insufficient Quantity of Product'); document.location='transaction.php?cid=$cid';</script>";
	}else if($qty <= 0 ){
		echo "<script>alert('Invalid Quantity'); document.location='transaction.php?cid=$cid';</script>";
	}else{
		mysqli_query($con,"update temp_trans set qty='$qty' where temp_trans_id='$id'")or die(mysqli_error());
		echo "<script>document.location='transaction.php?cid=$cid'</script>";  
	}
	
	

	
?>
