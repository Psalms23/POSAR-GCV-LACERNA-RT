<?php 

include('../dist/includes/dbcon.php');


	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['name'];
		$pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;
	
			
			mysqli_query($con,"INSERT INTO user(username,password,name,status)
			VALUES('$username','$pass','$name','active')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
					  echo "<script>document.location='user.php'</script>";  
	
?>