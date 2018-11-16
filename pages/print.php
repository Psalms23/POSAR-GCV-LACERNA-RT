<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    
    <style type="text/css">
      h5,h6{
        text-align:center;
      }


      @media print {
          .btn-print {
            display:none !important;
          }
      }
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">

          <section class="content">
            <div class="row">
	      <div class="col-md-12">
              <div class="col-md-12">

              </div>
                
                <div class="box-body">

                  <!-- Date range -->
                  <form method="post" action="transaction_add.php">
<?php
include('../dist/includes/dbcon.php');
$id=$_SESSION['id'];
$branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());
  
        $row=mysqli_fetch_array($query);
        
?>			
                  <h5><b><?php echo $row['branch_name'];?></b> </h5>  
                  <h6><?php echo $row['branch_address'];?></h6>
                  <h6>Contact #: <?php echo $row['branch_contact'];?></h6>
                  <h6 class="text-right">Date <?php echo date("M d, Y");?></h6>
                  <p class="text-center">WARRANTY CERTIFICATE </p>
                  <p class="text-center">This certificate is hereby issued by <?php echo $row['branch_name'];?> - <?php echo $row['branch_address'];?>  </p>
                  <p class="text-center">TO:</p>
                  <table class="table">
                    <thead>
<?php

    $branch=$_SESSION['branch'];
    $sid=$_REQUEST['sid'];
    $cid=$_REQUEST['cid'];
    $query=mysqli_query($con,"select * from customer natural join sales natural join term natural join product where cust_id='$cid'")or die(mysqli_error($con));
      
        $row=mysqli_fetch_array($query);
        $last=$row['cust_last'];
        $first=$row['cust_first'];
        $address=$row['cust_address'];
        $contact=$row['cust_contact'];
        
?>                    <tr>
                        <th>Customer's Name: </th>
                        <th><?php echo $last.", ".$first;?></th>
                      </tr>
                      <tr>
                        <th>Product Name:</th>
                        <th><?php echo $row['prod_name'];?></th>
                      </tr>
                      <tr>
                        <th>Product Serial #</th>
                        <th><?php echo $row['prod_id'];?></th>
                      </tr>
                    </thead>
                  </table>
                  <h4 class="text-center">THE TERMS AND CONDITIONS OF THIS WARRANTY ARE AS FOLLOWS:</h4>

<p><b>1.)</b>The photocopier is guaranteed againts any electronic and or mechanical defect under normal use for a period of 6 MONTHS or total accumulated copies whichever comes first, from the date od delivery. accessories like ADF, duplex unit, PF cabinet, printer kit, sorter and transaformer are executed from the warranty. Consumable parts like drum, blade, lamps and fuser rollers are excluded from the warranty. Our obligation under this warranty to limited to repairing and or replacing with a new or manufactured part, provided taht our judgement, such as part is thus defective.</p>

<p><b>2.)</b> Likewise the equipment is given 6 MONTHS FREE SERVICE warranty.</p>

<p><b></b> In the event that the installation and services is outside of General Santos City premises where the SELLER has no offcie, expenses for the transportation, food and lodging and per diem of technical representative shall be for the cost of the BUYER.</p>

<p><b>3.)</b> The warranty referred to in paragraph (1) are automatically revoked in any of the follwing situations:</p>

<p><b></b> a. Usage of any substance or consumable part which is not supplied by the seller;</p>

<p><b></b> b. Usage of any mechanism or gadget on the equipment or any of its accessories which is like wise not supplies by the seller;</p>

<p><b></b> c. Tampering with and/or improper usage of the equipment or any of its accessories;</p>

<p><b></b> d. Faulty of negligent use resulting to damage on the equipment or any of its accesories;.</p>

<p><b></b> e. External causes such as but not limited to extreme current fluctuations or any force majeure</p>

<p>It is hereby understood that the violation of the terms and condition herein stipulated shall render this agreement expired and become null and void without necessity of notice to teh vendee or any judicial decleration to that effect.</p>
                  <table class="table">
                    <thead>
                        
                      <tr><br>
                        <th>____________________________________________</th>
                        <th>Regular Cash Price</th>
                        <th><?php echo number_format($row['prod_price'],2);?></th>
                      </tr>
                      <tr>
                        <th>Customer’s printed name and signature/ Date</th>
                        <th>Downpayment</th>
            						<th><?php echo $row['down'];?></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th><?php echo $row['prod_id'];?></th>
                        <th><?php   ?></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th>Term</th>
                        <th><?php  echo $row['term']; ?></th>
                      </tr>
                      <tr>
                        <th></th>
                        <th><?php echo $row['payable_for'];?> month/s</th>
                        <th><?php echo $row['due'];?></th>
                      </tr>
                      
                      <tr>
                        <th></th>
                        <th>REBATE/Month</th>
                        <th><?php   ?></th>
                      </tr>
                      <tr>
                        <th>Schedule</th>
                        
                      </tr>
<?php
    $query2=mysqli_query($con,"select * from payment where sales_id='$sid' and payment='0' order by payment_date")or die(mysqli_error($con));
    while($row2=mysqli_fetch_array($query2)){
       
?>                     
                      <tr>
                        
                        <td>Due Date</td>
                        <td style="text-align:right"><?php echo $row2['payment_for'];?></td>
                        <td>Amount Due</td>
                        <td style="text-align:right"><?php echo $row2['due'];?></td>
                       
                      </tr>
<?php }?>                      <tr>
                        <th><p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>Signed by:<br>
                          </p>
                          <p></p>
                         <p></p>
                          <p></p>
                          <p></p>
                          <p></p>
                          <p></p>
                          <p></p>
              <p>IRINEO M. VISABELLA</p></th>
                      </tr>
                    </thead>
                    <tbody>

                </div><!-- /.box-body -->
				</div>  
				</form>	
                </div><!-- /.box-body -->
                <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                <a class = "btn btn-primary btn-print" href = "home.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
           
          </div><!-- /.row -->
	  
             
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
     
    </div><!-- ./wrapper -->
	
	
	<script type="text/javascript" src="autosum.js"></script>
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
   
  </body>
</html>
