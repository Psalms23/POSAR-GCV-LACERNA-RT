<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$last = $_POST['last'];
	$first = $_POST['first'];
	$mi = $_POST['mi'];
	$cn = $_POST['cn'];
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$payslip = $_POST['payslip'];
	$validid = $_POST['validid'];
	$cert = $_POST['cert'];
	$source = $_POST['source'];
	

	$query2=mysqli_query($con,"select * from customer where cust_last='$last' and cust_first='$first' and branch_id='$branch'")or die(mysqli_error($con));
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
			
			mysqli_query($con,"INSERT INTO customer(cust_last,cust_mname,cust_first,cname,cust_address,cust_contact,branch_id,balance,ci_remarks,payslip,valid_id,cert,income,cust_pic) 
				VALUES('$last','$mi','$first','$cn','$address','$contact','$branch','0','Approved','$payslip','$validid','$cert','$source','default.gif')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			//$_SESSION['cid']=$id;
			echo "<script type='text/javascript'>alert('Successfully added new creditor!');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
?>