<?php 

include('../dist/includes/dbcon.php');
	$category = $_POST['category'];
	$cat = $_POST['subcategory'];
	
	
	$query2=mysqli_query($con,"select * from subcategory where subcat_name='$cat' and cat_name='$category' and branch_id='branch'")or die(mysqli_error($con));
		$count=mysqli_num_rows($query2);

		if ($count>0)
		{
			echo "<script type='text/javascript'>alert('Sub Category already exist!');</script>";
			echo "<script>document.location='subcategory.php'</script>";  
		}
		else
		{			
			mysqli_query($con,"INSERT INTO subcategory(subcat_name,cat_name,branch_id) VALUES('$cat','$category','$branch')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new Sub category!');</script>";
					  echo "<script>document.location='subcategory.php'</script>";  
		}
?>