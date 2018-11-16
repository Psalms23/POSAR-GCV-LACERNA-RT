<?php
include("../dist/includes/dbcon.php");
$id=$_GET['id'];
$result=mysqli_query($con,"DELETE FROM brand WHERE brandid ='$id'")
	or die(mysqli_error());

?>