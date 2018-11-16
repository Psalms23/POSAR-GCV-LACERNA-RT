<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$pr_id = $_POST['pr_id'];
	$dr = $_POST['dr'];
	$qty = $_POST['qty'];
	
	
	date_default_timezone_set('Asia/Manila');

	$date = date("Y-m-d H:i:s");
	$id=$_SESSION['id'];
	
	$query=mysqli_query($con,"select pr_id from purchase_request natural join product where pr_id='$pr_id' and prod_id='$prod_name'")or die(mysqli_error());
  
        $row=mysqli_fetch_array($query);
		$product=$row['pr_id'];
	    $remarks="added $qty of $product";  
	
		mysqli_query($con,"INSERT INTO history_log(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($con));
		
		mysqli_query($con,"UPDATE purchase_request SET purchase_status='Received' where pr_id='$pr_id' and branch_id='$branch'") or die(mysqli_error($con));	 
	
  		
	mysqli_query($con,"UPDATE product SET prod_qty=prod_qty+'$qty' where branch_id='$branch'") or die(mysqli_error($con)); 
			
			mysqli_query($con,"INSERT INTO stockin(prod_id,dr,qty,date,branch_id,status) VALUES('$pr_id','$dr','$qty','$date','$branch','Complete')")or die(mysqli_error($con));


			echo "<script type='text/javascript'>alert('Successfully added new stocks!');</script>";
					  echo "<script>document.location='stockin.php'</script>";  
	
?>