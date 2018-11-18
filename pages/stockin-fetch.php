<?php 
include('../dist/includes/dbcon.php');
	$branch=$_POST['branch'];
	$pr_id = $_POST['pr_id'];
	$dr = $_POST['dr'];
	$qty = $_POST['qty'];
	
	date_default_timezone_set('Asia/Manila');

	$date = date("Y-m-d H:i:s");
	$id=$_SESSION['id'];
	
	$query=mysqli_query($con,"select * from purchase_request natural join product where pr_id='$pr_id'")or die(mysqli_error());
  
        $row=mysqli_fetch_array($query);

        $row['date']=$date;
        $row['dr']=$dr;
        $row['qty']=$qty;
		echo json_encode($row);
?>