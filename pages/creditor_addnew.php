<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$cname = $_POST['cname'];
	$cust_first = $_POST['cust_first'];
	$cust_mname = $_POST['cust_mname'];
	$cust_last = $_POST['cust_last'];
	$cust_contact = $_POST['cust_contact'];
	$cust_address = $_POST['cust_address'];
	$contp = $_POST['contp'];
	$tphone = $_POST['tphone'];

	
	$query2=mysqli_query($con,"select * from customer where cname='$cname' and cust_first='$cust_first' branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);
		$row=mysqli_fetch_array($query2);
			$id=$row['cust_id'];

		if ($count>0)
		{
			mysqli_query($con,"update customer set cust_contact='$contact' where cust_id='$id'")or die(mysqli_error());
	
			echo "<script type='text/javascript'>alert('Application resubmitted for approval!');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
		else
		{
			
			mysqli_query($con,"INSERT INTO  customer(cname,cust_first,cust_mname,cust_last,cust_contact,cust_address,contp,tphone,branch_id) 
				VALUES('$cname','$cust_first','$cust_mname','$cust_last','$cust_contact','cust_address','contp','$tphone','$branch')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			//$_SESSION['cid']=$id;
			echo "<script type='text/javascript'>alert('Successfully added new creditor!');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
?>