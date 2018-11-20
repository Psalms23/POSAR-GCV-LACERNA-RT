<?php 
include('../dist/includes/dbcon.php');

$brand = $_REQUEST['brand'];
$query=mysqli_query($con,"select * from brand where brandid='$brand'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
echo json_encode($row);

 ?>