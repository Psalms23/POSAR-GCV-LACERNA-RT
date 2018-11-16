<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$cname = $_POST['cname'];
	$cust_first = $_POST['cust_first'];
	$cust_mname = $_POST['cust_mname'];
	$cust_last = $_POST['cust_last'];
	$cust_address = $_POST['cust_address'];
	$cust_contact = $_POST['cust_contact'];
	$contp = $_POST['contp'];
	$tphone = $_POST['tphone'];
			
	$query2=mysqli_query($con,"select * from customer where cname='$cname' and cust_first='$cust_first' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Customer already exist!');</script>";
			echo "<script>document.location='creditornew.php'</script>";  
		}
		else
		{	
			
		mysqli_query($con,"INSERT INTO  customer(cname,cust_first,cust_mname,cust_last,cust_address,cust_contact,contp,tphone,branch_id) 
				VALUES('$cname','$cust_first','$cust_mname','$cust_last','$cust_address','$cust_contact','$contp','$tphone','$branch')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			//$_SESSION['cid']=$id;
			//echo "<script type='text/javascript'>alert('Successfully added new customer!');</script>";
			echo "<script>document.location='creditor1.php?cid=$id'</script>";  
		}
?>