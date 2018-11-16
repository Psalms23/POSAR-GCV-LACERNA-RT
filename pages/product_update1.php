<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;

include('../dist/includes/dbcon.php');
	$id = $_POST['id'];
	$name = $_POST['prod_name'];
	$prod_price = $_POST['prod_price'];
	$prod_desc = $_POST['prod_desc'];
	$reorder = $_POST['reorder'];
	$serial = $_POST['serial'];
	$prod_brand = $_POST['prod_brand'];
	$prod_model = $_POST['prod_model'];
	$prodcat = $_POST['prodcat'];
	$prodsubcat = $_POST['prodsubcat'];
	
	$pic = $_FILES["image"]["name"];
			if ($pic=="")
			{	
				if ($_POST['image1']<>""){
					$pic=$_POST['image1'];
				}
				else
					$pic="default.gif";
			}
			else
			{
				$pic = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
					move_uploaded_file($temp, "../dist/uploads/".$pic);
				      }
					}
			
			}
	//		mysqli_query($con,"INSERT INTO product(prod_name,prod_price,prod_desc,reorder,branch_id,serial,prod_brand,prod_model,prodcat,prodsubcat)
			
	mysqli_query($con,"update product set prod_name='$name',prod_price='$prod_price',prod_desc='$prod_desc',reorder='$reorder',serial='$serial',prod_brand='$prod_brand',prod_model='$prod_model',prodcat='$prodcat',prodsubcat='$prodsubcat' where prod_id='$id'")or die(mysqli_error($con));
	
	echo "<script type='text/javascript'>alert('Successfully updated product details!');</script>";
	echo "<script>document.location='product.php'</script>";  

	
?>
