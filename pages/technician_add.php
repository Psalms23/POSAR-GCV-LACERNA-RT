<?php 

include('../dist/includes/dbcon.php');

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$cno = $_POST['cno'];
	
	$query2=mysqli_query($con,"select * from technician where fname='$fname'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Technician already exist!');</script>";
			echo "<script>document.location='technician.php'</script>";  
		}
		else
		{			
			mysqli_query($con,"INSERT INTO technician(fname,lname,cno) VALUES('$fname','$lname','$cno')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new category!');</script>";
					  echo "<script>document.location='technician.php'</script>";  
		}
?>