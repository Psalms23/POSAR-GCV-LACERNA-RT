<?php 
session_start();
include('../dist/includes/dbcon.php');
	
	$branch = $_POST['data'][5];;
	$id = $_POST['data'][0];
	$reorder = $_POST['data'][4];
	date_default_timezone_set('Asia/Manila');
	$date = date("Y-m-d");

			mysqli_query($con,"INSERT INTO purchase_request(prod_id,branch_id,qtypr,request_date,purchase_status)
			VALUES('$id','$branch','$reorder','$date','pending')")or die(mysqli_error($con));
			echo json_encode(["message"=>"done"]);
?>