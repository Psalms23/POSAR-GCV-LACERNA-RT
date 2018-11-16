<?php 

include('../dist/includes/dbcon.php');


	$username = $_POST['username'];
	$password = $_POST['password'];
	$position = $_POST['position'];
	$name = $_POST['name'];
	$lname = $_POST['lname'];
	$cno = $_POST['cno'];
		$pass=md5($password);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;
	
			
			mysqli_query($con,"INSERT INTO user(username,password,position,name,lname,cno,status)
			VALUES('$username','$pass','$position','$name','$lname','$cno','active')")or die(mysqli_error($con));

			echo "<script type='text/javascript'>alert('Successfully added new user!');</script>";
					  echo "<script>document.location='user.php'</script>";  
	
?>