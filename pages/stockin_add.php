<?php 
session_start();
include('../dist/includes/dbcon.php');


	$branch=$_REQUEST["data"][6];
	$pr_id = $_REQUEST["data"][0];
	$dr = $_REQUEST["data"][1];
	$qty = $_REQUEST["data"][4];
	$date = $_REQUEST["data"][5];
	$id = $_REQUEST["data"][7];

	date_default_timezone_set('Asia/Manila');
  
		$product=$pr_id;
	    $remarks="added $qty of $product";  
		$query = mysqli_query($con,"select * from purchase_request where pr_id='$pr_id' and branch_id='$branch'")or die(mysqli_error($con));
		$row=mysqli_fetch_array($query);
		$prod_id = $row['prod_id'];
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
		
		mysqli_query($con,"UPDATE purchase_request SET purchase_status='Received' where pr_id='$pr_id' and branch_id='$branch'") or die(mysqli_error($con));	 
	
  		
	mysqli_query($con,"UPDATE product SET prod_qty=prod_qty+'$qty' where branch_id='$branch'") or die(mysqli_error($con)); 
			
			mysqli_query($con,"INSERT INTO stockin(prod_id,dr,qty,date,branch_id,status,pr_id) VALUES('$prod_id','$dr','$qty','$date','$branch','Complete',$pr_id)")or die(mysqli_error($con));


			$response = ["message"=>"Stocks Saved"];
			echo json_encode($response);
  
	
?>