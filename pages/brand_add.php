<?php 

include('../dist/includes/dbcon.php');

	$cat = $_POST['brandn'];
	$mod = $_POST['brandm'];
	
	$query2=mysqli_query($con,"select * from brand where brandn='$cat'and brandm='$mod'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Brand already exist!');</script>";
			echo "<script>document.location='brand.php'</script>";  
		}
		else
		{			
			mysqli_query($con,"INSERT INTO brand(brandn,brandm) VALUES('$cat','$mod')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new brand!');</script>";
					  echo "<script>document.location='brand.php'</script>";  
		}
?>