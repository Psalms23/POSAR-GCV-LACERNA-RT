<?php 
session_start();
include('../dist/includes/dbcon.php');
	$branch=$_SESSION['branch'];
	$prejob_id = $_POST['prejob_id'];
	$jobdesc = $_POST['jobdesc'];
	$date = $_POST['date'];
	$sched = $_POST['sched'];
	$fname = $_POST['fname'];
	$cust_address = $_POST['cust_address'];
	$status = $_POST['status'];
	$prod_name = $_POST['prod_name'];
	$prod_qty = $_POST['prod_qty'];
	$prod_model = $_POST['prod_model'];
	$prod_brand = $_POST['prod_brand'];

	
	$query2=mysqli_query($con,"select * from prejoborder where cust_last='$last' and cust_first='$first' and branch_id='$branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);
		$row=mysqli_fetch_array($query2);
			$id=$row['cust_id'];

		if ($count>0)
		{
			mysqli_query($con,"update customer set cust_contact='$contact',credit_status='pending' where cust_id='$id'")or die(mysqli_error());
	
			echo "<script type='text/javascript'>alert('Application resubmitted for approval!');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
		else
		{	
			
			mysqli_query($con,"INSERT INTO customer(cust_last,cust_first,cust_address,cust_contact,branch_id,balance,credit_status,bday,nickname,house_status,years,rent,emp_name,emp_no,emp_address,emp_year,occupation,salary,spouse,spouse_no,spouse_emp,spouse_details,spouse_income,comaker,comaker_details,cust_pic) 
				VALUES('$last','$first','$address','$contact','$branch','0','pending','$bday','$nickname','$house_status','$years','$rent','$emp_name','$emp_no','$emp_address','$emp_year','$occupation','$salary','$spouse','$spouse_no','$spouse_emp','$spouse_details','$spouse_income','$comaker','$comaker_details','default.gif')")or die(mysqli_error($con));

			$id=mysqli_insert_id($con);
			//$_SESSION['cid']=$id;
			echo "<script type='text/javascript'>alert('Successfully added new creditor! Waiting for admin approval.');</script>";
			echo "<script>document.location='creditor.php'</script>";  
		}
?>