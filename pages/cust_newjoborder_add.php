<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$cname = $_POST['cname'];
	$cust_first = $_POST['cust_first'];
	$cust_last = $_POST['cust_last'];
	$cust_contact = $_POST['cust_contact'];
	$cust_address = $_POST['cust_address'];
	
	$query2=mysqli_query($con,"select * from prejoborder where cname='$cname' and cust_first='$cust_first' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
			echo "<script>document.location='cust_newjoborder_add.php'</script>";  
		}
		else
		{	
			
			mysqli_query($con,"INSERT INTO prejoborder(cname,cust_first,cust_last,cust_contact,cust_address,branch_id) 
				VALUES('$cname','$cust_first','$cust_last','$cust_contact','$cust_address','$branch')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			//$_SESSION['cid']=$id;
			//echo "<script type='text/javascript'>alert('Successfully added new customer!');</script>";
			echo "<script>document.location='prejoborder1.php?cid=$id'</script>";  
		}
?>