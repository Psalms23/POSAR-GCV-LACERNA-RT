<?php session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Creditor | <?php include('../dist/includes/title.php');?></title>
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
    <style>
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
 <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');
      include('../dist/includes/dbcon.php');
      ?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <a class="btn btn-lg btn-warning" href="home3.php">Back</a>
              <a class="btn btn-lg btn-primary" href="application.php">Apply as Creditor</a>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Creditor</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	          
			
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Creditor List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Company Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
					    <th>Address</th>
                        <th>Contact</th>
                        <th>Balance</th>
                        <th>Remarks</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$branch=$_SESSION['branch'];
		$query=mysqli_query($con,"select * from customer where branch_id='$branch'")or die(mysqli_error());
		$i=1;
while($row=mysqli_fetch_array($query)){
    $cid=$row['cust_id'];
	  $ci=$row['ci_remarks'];
      $payslip=$row['payslip']; if($payslip==1) $payslip1='checked';
      $valid_id=$row['valid_id'];if($valid_id==1) $valid_id1='checked';
      $cedula=$row['cedula'];if($cedula==1) $cedula1='checked';
     $cert=$row['cert'];if($cert==1) $cert1='checked';
     $income=$row['income'];if($income==1) $income1='checked';
      
?>
          <tr>
			  <td><?php echo $row['cname'];?></td>
              <td><?php echo $row['cust_first'];?></td>
             <td><?php echo $row['cust_mname'];?></td>
			<td><?php echo $row['cust_address'];?></td>
            <td><?php echo $row['cust_contact'];?></td>
		<td><?php echo $row['balance'];?></td>
			<td><?php echo $row['ci_remarks'];?></td>
         			
                        <td>
<a href="<?php if ($row['cust_last']) echo "account_summary.php?cid=$cid";?>"><i class="glyphicon glyphicon-share-alt text-green"></i></a>
				
              <!---  <a href="#updateordinance<!?php echo $row['cust_id'];?>" data-target="#updateordinance<!?php echo $row['cust_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-orange"></i></a---->
                <a href="view_application.php?cid=<?php echo $row['cust_id'];?>" class="small-box-footer"><i class="glyphicon glyphicon-eye-open text-primary"></i></a>

				
						</td>
                      </tr>
				<!---div id="updateordinance<!?php echo $row['cust_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:250px">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update  Details</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="ci_update.php" enctype='multipart/form-data'>
              
				<div class="form-group">
					<label class="control-label col-lg-3" for="name">Requirements</label>
					<div class="col-lg-9">
						
					</div>
				</div>				
        <div class="form-group">
          <label class="control-label col-lg-3" for="name"></label>
          <div class="col-lg-9">
            <input type="checkbox" class="form-check" id="name" name="payslip" value="1" <!?php echo $payslip;?>> Sketch 
          </div>
        </div>        
        <div class="form-group">
          <label class="control-label col-lg-3" for="name"></label>
          <div class="col-lg-9">
            <input type="checkbox" class="form-check" id="name" name="valid_id" value="1" <!?php echo $valid_id;?>> 2 Valid ID 
          </div>
        </div>        
        <div class="form-group">
          <label class="control-label col-lg-3" for="name"></label>
          <div class="col-lg-9">
            <input type="checkbox" class="form-check" id="name" name="brgyclrnce" value="1" <!?php echo $cedula;?>> Brgy. Certificate 
          </div>
        </div>        
              
        <div class="form-group">
          <label class="control-label col-lg-3" for="name"></label>
          <div class="col-lg-9">
            <input type="checkbox" class="form-check" id="name" name="sourceofinc" value="1" <!?php echo $cert;?>>  Proof of Income
          </div>
        </div>        
				
				
              <br><br><br><hr>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
			  </form>
            </div>
			
        </div><!--end of modal-dialog-->
 </div>
 <!--end of modal-->   	  
                 
<?php $i++;}?>					  
                    </tbody>
                    <tfoot>
                      <tr>
                         <th>Company Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
					    <th>Address</th>
                        <th>Contact</th>
                        <th>Balance</th>
                        <th>Remarks</th>
                        <th>Action</th>
                      </tr>					  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
	 
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
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
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
